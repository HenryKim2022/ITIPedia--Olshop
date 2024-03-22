<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequestForm;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SpatieRole;
use Spatie\Permission\Models\Role;
use Hash;

class StaffsController extends Controller
{
    # construct
    public function __construct()
    {
        $this->middleware(['permission:staffs'])->only('index');
        $this->middleware(['permission:add_staffs'])->only(['create', 'store']);
        $this->middleware(['permission:edit_staffs'])->only(['edit', 'update']);
        $this->middleware(['permission:delete_staffs'])->only(['delete']);
    }

    # staff list
    public function index(Request $request)
    {
        $searchKey = null;
        $ownOrAllStaff = auth()->user()->can('own_staff') && auth()->user()->user_type != 'admin' ? true : false;
        $staffs = User::where('user_type', 'staff')->latest();
        if ($request->search != null) {
            $staffs = $staffs->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }
        if ($ownOrAllStaff) {

            $staffs = $staffs->where('created_by', auth()->user()->id);
        }
        $staffs = $staffs->where('id', '!=', auth()->user()->id)->paginate(paginationNumber());
        return view('backend.pages.staffs.index', compact('staffs', 'searchKey'));
    }

    # return create form
    public function create()
    {
        $roles = SpatieRole::oldest()->where('id', '!=', 1)->isActive()->get();
        return view('backend.pages.staffs.create', compact('roles'));
    }

    # save new staff
    public function store(StaffRequestForm $request)
    {
        if (User::where('email', $request->email)->first() == null) {
            $user             = new User;
            $user->name       = $request->name;
            $user->email      = $request->email;
            $user->shop_id    = auth()->user()->shop_id ?? 1;
            $user->phone      = validatePhone($request->phone);
            $user->user_type  = "staff";
            $user->password   = Hash::make($request->password);
            $user->role_id    = $request->role_id;
            $user->created_by = auth()->user()->id;         
            $user->save();
            $user->assignRole(SpatieRole::findOrFail($request->role_id)->name);

            flash(localize('Staff has been inserted successfully'))->success();
            return redirect()->route('admin.staffs.index');
        }
        flash(localize('Email already used'))->error();
        return back();
    }

    # edit staff
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = SpatieRole::latest()->where('id', '!=', 1)->isActive()->get();
        return view('backend.pages.staffs.edit', compact('user', 'roles'));
    }

    # update staff 
    public function update(Request $request)
    {
        $exit_email = User::where('email', $request->email)->where('id', '!=', $request->id)->first();
        if ($exit_email) {
            flash(localize('This Email address already exit'))->warning();
            return redirect()->back();
        }
        $user             = User::findOrFail($request->id);
        $old_role_id      = $user->role_id;
        $user->name       = $request->name;
        $user->email      = $request->email;
        $user->phone      = validatePhone($request->phone);
        $user->role_id    = $request->role_id;

        if ($request->filled('role_id')) {
            $user->role_id    = $request->role_id;
        }

        if (strlen($request->password) > 0) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($request->filled('role_id')) {
            if ($old_role_id != (int)$request->role_id) {
                $user->removeRole(SpatieRole::findOrFail($old_role_id)->name);
            }

            $user->assignRole(SpatieRole::findOrFail($request->role_id)->name);
        }
        flash(localize('Staff has been updated successfully'))->success();
        return redirect()->route('admin.staffs.index');
    }

    # delete staff  
    public function delete($id)
    {
        User::where('id', $id)->forceDelete();
        flash(localize('Staff has been deleted successfully'))->success();
        return redirect()->route('admin.staffs.index');
    }
}
