<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }


    public function permissionsofadmin(){

    $permissions= Permission::wherehas('roles',function($query){
        $query->where('name','Admin');
    })
    ->orderBy('name', 'asc')
    ->get();


    dd($permissions);
    }



    public function editorrole(){
        $users = User::select('first_name', 'last_name', 'email')
        ->whereHas('roles', function ($query) {
            $query->where('name','Editor');
        })
        ->orderBy('last_name', 'asc')
        ->get();

        dd($users);

    }


    public function create_post_permission(){
        $roles = Role::select('name')
        ->withCount('permissions')
        ->whereHas('permissions', function ($query) {
            $query->where('name','Create Posts');
        })
        ->orderBy('name', 'asc')
        ->get();


        dd($roles);

    }
}
