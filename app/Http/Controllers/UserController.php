<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('manage.users.create')->withRoles($roles);
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ]);

        if($request->has('password') && !empty($request->password)){
            $password = $request->password;
        }else{
            $length = 10;
            $keyspace = '123456789abcdefghjklmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') -1;
            for($i=0; $i<$length; $i++){
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($password);

        $user->save();

        $user->syncRoles(explode(',', $request->roles));

        if($user->save()){
            Session::flash('message', 'User Created Successfully!!'); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('users.show', $user->id);
        }else{
            Session::flash('message', 'Problem occured when creating user, Try Again!!'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        $roles = Role::all();
        return view('manage.users.edit')->withUser($user)->withRoles($roles);
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password_options == 'auto'){
            $length = 10;
            $keyspace = '123456789abcdefghjklmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str = '';
            $max = mb_strlen($keyspace, '8bit') -1;
            for($i=0; $i<$length; $i++){
                $str .= $keyspace[random_int(0, $max)];
            }
            $user->password = bcrypt($str);
        }elseif ($request->password_options == 'manual') {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $user->syncRoles(explode(',', $request->roles));

        if($user->save()){
            Session::flash('message', 'The User Has been updated successfully!!'); 
            Session::flash('alert-class', 'alert-primary');
            return redirect()->route('users.show', $user->id);
        }else{
            Session::flash('message', 'Problem occured when editing user, Try Again!!'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('users.update', $user->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
