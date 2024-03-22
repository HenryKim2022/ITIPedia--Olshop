<?php

namespace Modules\Support\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Support\Entities\Priority;
use Modules\Support\Http\Requests\PriorityRequestForm;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $priorities = $this->getpriorities($request);
        return view('support::priority.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('support::create');
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PriorityRequestForm $request)
    {
        try {
            Priority::create($this->formatParams($request));
            return redirect()->route('support.priority.index');
            flash(localize('Priority Created Successfully'))->success();
        } catch (\Throwable $th) {
            flash(localize('Priority Created Failed'))->error();
            return redirect()->back();
        }
    }

    private function formatParams($request, $model = null):array
    {
        $params = [
            'name'=>$request->name,
            'is_active'=>$request->status,
            'user_id'=>auth()->user()->id,
            'color'=>$request->color,
        ];

        return $params;
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('support::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $priority = $this->getpriority($id);
        return view('support::priority.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PriorityRequestForm $request)
    {
        try{
            $id = $request->id;
            $priority = $this->getpriority($id);
            if($priority){
                $priority->update($this->formatParams($request));
            }
            flash(localize('Priority Updated Successfully'))->success();
            return redirect()->route('support.priority.index');
        }catch(\Exception $e) {
            flash(localize('Priority update failed'))->error();
            return redirect()->route('support.priority.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $priority = $this->getpriority($id);
        if($priority){
            $priority->delete();
        }
        flash(localize('Priority Deleted Successfully'))->success();
        return redirect()->route('support.priority.index');
    }
    private function getpriority($id) 
    {
        $priority = Priority::where('id', $id)->where('user_id', auth()->user()->id)->first();
        return $priority;
    }
    private function getpriorities($request = null)
    {

       return $priorities = Priority::when($request->search, function($q) use($request){
            $q->where('name', 'like', '%' . $request->search . '%');
        })->when(auth()->user()->user_type != 'admin', function($q){
            $q->where('user_id', auth()->user()->id);
        })->paginate(paginationNumber());
    }
}
