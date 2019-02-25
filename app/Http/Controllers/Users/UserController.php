<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin', 'preventBackHistory']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('name')->paginate(15);
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|max:120',
            'email'                 => 'required|email|unique:users',  
            'password'              => 'nullable|required_with:password_confirmation|same:password_confirmation|min:8',   
            'password_confirmation' => 'nullable|required_with:password|min:8',  
            'select_role'           => 'required|integer',  
        ]);

        $user = new User();
        $user->name            = $request->get('name');
        $user->email           = $request->get('email');
        $user->password        = $request->get('password');
        $user->save();

        $roles = $request['select_role'];

        if (isset($roles)) {        
            $user->roles()->sync($roles);        
        }        
        else {
            $user->roles()->detach();
        } 

        $notification = array(
            'message' => 'The user has been created successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::orderBy('name')->paginate(15);
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'                  => 'required|max:120',
            'email'                 => 'required|email',  
            'password'              => 'nullable|required_with:password_confirmation|same:password_confirmation|min:8',   
            'password_confirmation' => 'nullable|required_with:password|min:8',  
            'select_role'           => 'required|integer',  
        ]);

        $user = User::find($id);
        $user->name  = $request->get('name');
        $user->email = $request->get('email');

        if( !empty($request->input('password')) ) {
            $user->password = $request->input('password');
        }

        $user->save();

        $roles = $request['select_role'];

        if (isset($roles)) {        
            $user->roles()->sync($roles);        
        }        
        else {
            $user->roles()->detach();
        } 

        $notification = array(
            'message' => 'The user has been edited successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
