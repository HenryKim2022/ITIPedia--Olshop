<?php

namespace Modules\Support\Http\Controllers;

use App\Models\SubscriptionPackage;
use App\Models\User;
use App\Notifications\SupportTicketNotification;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Support\Entities\AssignTicket;
use Modules\Support\Entities\Ticket;
use Modules\Support\Http\Requests\TicketRequestForm;
use DB;
use Illuminate\Support\Facades\Route;
use Modules\Support\Entities\Priority;
use Modules\Support\Entities\TicketCategory;
use Modules\Support\Entities\TicketFile;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index(Request $request)
    {
        $tickets = self::getTickets();
        $categories = TicketCategory::withCount('tickets')->get();

        if(auth()->user()->user_type == 'customer'){
            return view('support::ticket.customer_index', compact('tickets', 'categories'));
        }
        return view('support::ticket.index', compact('tickets', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data = $this->loadData();
        return view('support::ticket.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TicketRequestForm $request)
    {
        try {           
            $model = Ticket::create($this->formatParams($request));
            $assignStaffs = $request->staffs ? $request->staffs : null;
            $files = $request->file('files');

            # image store
            if($files){
                $this->storeImages($files, $model->id);
            }
            # assign ticket
            if($assignStaffs){
                $this->assignStaffs($assignStaffs, $model->id);
            }
            $this->setNotification($request->category);
            flash(localize('Ticket Created Successfully'))->success();
            return redirect()->route('support.ticket.create');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('support.ticket.create');
        }
    }

    private function formatParams($request, $model = null):array
    {
        $params = [
            'title'=>$request->title,
            'category_id'=>$request->category,
            'description'=>$request->description, 
            'priority_id'=>$request->priority,      
        ];
        if(!$model) {
            $params['created_by'] = auth()->user()->id;
        }
        return $params;
    }
    private function storeImages($image, $modelId)
    {
        
        $path = 'public/uploads/ticket/';

        $storeImage = new TicketFile;
        $storeImage->ticket_id = $modelId;
        $storeImage->file_path = fileUpload($path, $image);
        $storeImage->save();
      
        
    }
    private function assignStaffs($staff_ids, $modelId)
    {
        array_merge($staff_ids, auth()->user()->id);
        if($staff_ids) {
            foreach($staff_ids as $staff_id) {
                $assignTicket = new AssignTicket();
                $assignTicket->ticket_id = $modelId;
                $assignTicket->assign_user_id = $staff_id;
                $assignTicket->save();
            }
        }
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $ticket = Ticket::where('id', $id)->where('is_active', 1)->first();
        return view('support::ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = auth()->user();
        $data = $this->loadData();
        $data['ticket'] = Ticket::where('id', $id)->when($user->user_type !='admin', function($q) use($user){
            $q->where('created_by', $user->id);
        })->first();
        if(!$data['ticket']){
            flash(localize('Ticket not found for you'));
            return redirect()->back();
        }
        $data['categories'] = TicketCategory::withCount('tickets')->get();
        return view('support::ticket.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $ticket = Ticket::with('images')->where('id', $id)->when($user->user_type !='admin', function($q) use ($user){
            $q->where('created_by', $user->id);
        })->first();
        if(!$ticket){
            flash(localize('Ticket not found'))->warning();
            return redirect()->route('support.ticket.index');
        }
        if($ticket->images){
            foreach($ticket->images as $image) {
                if(file_exists($image->file_path)) {
                    unlink($image->file_path);
                }
                $image->delete();
            }
        }
        if($ticket->assignStaffs){
            $ticket->assignStaffs->delete();
        }
        $ticket->delete();
        flash(localize('Ticket Delete Successfully'))->success();
        return redirect()->route('support.ticket.index');
    }
    public static function getTickets($request = null)
    {
        $user = auth()->user();
        if($user->user_type == 'admin') {
            $tickets = Ticket::orderBy('id', 'DESC')->when($request != null && $request->category, function($q) use($request) {
                $q->where('category_id', $request->category_id);
            })->orderBy('id', 'DESC')->paginate(paginationNumber());
        }elseif($user->user_type =='staff'){
            $assigUserTicketids = AssignTicket::where('assign_user_id', $user->id)->pluck('ticket_id')->toArray();
            $tickets = Ticket::orderBy('updated_at', 'ASC')->when($request != null && $request->category, function($q) use($request) {
                $q->where('category_id', $request->category_id);
            })->orderBy('id', 'DESC')->paginate(paginationNumber());
        }else {

            $tickets = Ticket::where('created_by', $user->id)->when($request != null && $request->category, function($q) use($request) {
                $q->where('category_id', $request->category_id);
            })->orderBy('id', 'DESC')->paginate(paginationNumber());
        }

        return $tickets;
    }
    public function updateStatus(Request $request)
    {
        if(auth()->user()->user_type == 'admin') {
            $ticket = Ticket::findOrFail($request->id);  
            $ticket->is_active = $request->is_active;
    
            if ($ticket->save()) {
                return [
                    'status'    => true,
                    'message'    => localize('Status updated successfully'),
                ];
            } 
        }

        return [
            'status'    => false,
            'message'    => localize('Something went wrong'),
        ];
    }
    private function loadData():array
    {
        $data = [];
        $data['categories'] = TicketCategory::where('is_active', 1)->get(['id', 'name']);
        $data['priorities'] = Priority::where('is_active', 1)->get(['id', 'name']);
        $data['staffs']     = User::where('user_type', 'staffs')->where('is_banned', 1)->get(['id', 'name']);
        return $data;
    }
    private function setNotification($category_id)
    {
        try {
            
            $user = auth()->user();
            $url = 'dashboard/support/ticket';

            $msg = $user->name.' '. localize('Submit A ticket');
            $category = TicketCategory::where('id', $category_id)->first();
           
            // set notification assign staff
            if($category){
                $assignStaff = $category->assignStaff;
                if($assignStaff) {
                    $assignStaff->notify(new SupportTicketNotification($url, $msg));
                }
            }
            // set notification for admin
            if($user->user_type !='admin') {
                $admin = User::where('user_type', 'admin')->first();
                if($admin){
                    $admin->notify(new SupportTicketNotification($url, $msg));
                }
            }
 
        } catch (\Throwable $th) {
            //throw $th;
        }
        
      
    }
}
