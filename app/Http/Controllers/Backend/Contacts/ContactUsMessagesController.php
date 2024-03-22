<?php

namespace App\Http\Controllers\Backend\Contacts;

use App\Http\Controllers\Controller;
use App\Models\ContactUsMessage;

class ContactUsMessagesController extends Controller
{
    # construct
    public function __construct()
    {
        $this->middleware(['permission:contact_us_messages'])->only('index');
    }

    # get all query messages
    public function index()
    {
        $messages = ContactUsMessage::orderBy('is_seen', 'ASC')->latest()->paginate(paginationNumber());
        return view('backend.pages.queries.index', compact('messages'));
    }

    # make message read
    public function read($id)
    {
        $message = ContactUsMessage::where('id', $id)->first();

        if ($message->is_seen == 0) {
            $message->is_seen = 1;
            flash(localize('Marked as read'))->success();
        } else {
            $message->is_seen = 0;
            flash(localize('Marked as unread'))->success();
        }
        $message->save();
        return back();
    }

        
    # delete
    public function delete($id, $force = null)
    {
        $message = ContactUsMessage::where('id', $id)->first(); 
        if(!is_null($message)){
            if ($force != null) {
                $message->forceDelete();
            }else{
                $message->delete();
            }
        }
        
        flash(localize('Message deleted successfully'))->success();
        return redirect()->route('admin.queries.index');
    }

    # deleteAll
    public function deleteAll()
    {
        ContactUsMessage::whereNotNull('id')->forceDelete();              
        flash(localize('Messages deleted successfully'))->success();
        return redirect()->route('admin.queries.index');
    }
}
