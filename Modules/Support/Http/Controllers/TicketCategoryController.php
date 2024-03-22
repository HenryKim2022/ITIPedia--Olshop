<?php

namespace Modules\Support\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Support\Entities\TicketCategory;
use Modules\Support\Http\Requests\CategoryRequestForm;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $categories = $this->getCategories($request);
        $staffs= User::where('user_type', 'staffs')->get(['id', 'name']);
        return view('support::category.index', compact('categories', 'staffs'));
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
    public function store(CategoryRequestForm $request)
    {
        try {
            TicketCategory::create($this->formatParams($request));
            return redirect()->route('support.category.index');
            flash(localize('Category Created Successfully'))->success();
        } catch (\Throwable $th) {
            flash(localize('Category Created Failed'))->error();
            return redirect()->back();
        }
    }

    private function formatParams($request, $model = null):array
    {
        $params = [
            'name'=>$request->name,
            'is_active'=>$request->status,
            'user_id'=>auth()->user()->id,
            'assign_staff'=>$request->assign_staff
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
        $category = $this->getCategory($id);
        $staffs= User::where('user_type', 'staffs')->get(['id', 'name']);
        return view('support::category.edit', compact('category', 'staffs'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CategoryRequestForm $request)
    {
        try{
            $id = $request->id;
            $category = $this->getCategory($id);
            if($category){
                $category->update($this->formatParams($request));
            }
            flash(localize('Category Updated Successfully'))->success();
            return redirect()->route('support.category.index');
        }catch(\Exception $e) {
            flash(localize('category update failed'))->error();
            return redirect()->route('support.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $category = $this->getCategory($id);
        if($category){
            $category->delete();
        }
        flash(localize('Category Deleted Successfully'))->success();
        return redirect()->route('support.category.index');
    }
    private function getCategory($id) 
    {
        $category = TicketCategory::where('id', $id)->where('user_id', auth()->user()->id)->first();
        return $category;
    }
    private function getCategories($request = null)
    {

       return $categories = TicketCategory::when($request->search, function($q) use($request){
            $q->where('name', 'like', '%' . $request->search . '%');
        })->when(auth()->user()->user_type != 'admin', function($q){
            $q->where('user_id', auth()->user()->id);
        })->paginate(paginationNumber());
    }
}