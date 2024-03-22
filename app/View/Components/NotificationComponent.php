<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        $data['newOrdersCount'] = 0;
        $data['newMsgCount'] = 0;
        $data['newOrdersCount'] = \App\Models\Order::isPlaced()->count();
        $data['newMsgCount'] = \App\Models\ContactUsMessage::where('is_seen', 0)->count();
        
        return view('components.notification-component')->with($data);
    }
}
