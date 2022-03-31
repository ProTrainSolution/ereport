<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admins.roles.index', [
            'title' => 'User Role',
            'active' => 'role',
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admins.roles.create', [
            'title' => 'User Role',
            'active' => 'role'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
            'display_name' => 'required|max:255',
        ]);

        //$validateData['user_id'] = auth()->user()->id;

        Role::create($validateData);

        // simpan dan redirect
        return redirect('/roles')->with('success', 'New role has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return view('admins.roles.show', [
            'title' => 'User Role',
            'active' => 'role',
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('admins.roles.edit', [
            'title' => 'User Role',
            'active' => 'role',
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $rules = [
            'name' => 'required|max:255',
            'display_name' => 'required',
            'description' => ''
        ];

        $validateData = $request->validate($rules);

        Role::where('id', $role->id)
            ->update($validateData);

        // simpan dan redirect
        return redirect('/roles')->with('success', 'Role has benn updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        Role::destroy($role->id);
        return redirect('/roles')->with('delete', 'Role has been deleted.');


    }
}
