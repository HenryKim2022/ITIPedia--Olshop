<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusChange extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $model_id;
    private $table;
    private $status;
    public function __construct($modelid, $table, $status)
    {
        //
        $this->model_id = $modelid;
        $this->table = $table;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['status'] = $this->status;
        $data['model_id'] = $this->model_id;
        $data['table'] = $this->table;

        return view('components.status-change', $data);
    }
}
