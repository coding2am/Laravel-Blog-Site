<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Http\Requests\roleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backend.role.index',compact('roles'));
    }
    public function create()
    {
        return view('backend.role.create');
    }
    public function store(roleRequest $request)
    {
       Role::create([
           'name'=> $request->get('name')
       ]);
       return redirect('admin/roles')->with('status','New role has been added.');
    }
    public function edit($id)
    {
        $role = Role::find($id);
        return view('backend.role.edit',compact('role'));
    }
    public function update(roleRequest $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->update();
        return redirect('admin/roles')->with('status','Role id'.$id.' has been updated.');
    }
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('admin/roles')->with('status','Successfully deleted.');
    }
}
