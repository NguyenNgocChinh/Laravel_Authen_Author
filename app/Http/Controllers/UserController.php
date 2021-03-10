<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $groups = Group::all();
        $permissions = Permission::all();

        return view('User.index', [
            'users' => User::all(),
            'groups' => $groups,
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required:Username is not empty|unique:users,username',
            'password' => 'required:Password is not empty|confirmed:password_confirmation',
            'name' => 'required',
            'email' => 'required|email|unique:users,email'
        ]);

        $request->offsetSet('password',  ($request->password));

        $result = User::create($request->all());

        foreach ($request->group as $group)
        {
            $gr = Group::find($group);
            $result->group()->attach($gr);
        }

        foreach ($request->permission as $permission)
        {
            $per = Permission::find($permission);
            $result->permission()->attach($per);
        }

        if ($result){
            return redirect()->back()->with('success','ADD Product successfully');
        }
        else{
            return back()->withErrors([
                'error' => 'ERROR',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete())
            return redirect()->back()->with('success','ADD Product successfully');
        else
            return back()->withErrors([
                'error' => 'ERROR',
            ]);

    }
}
