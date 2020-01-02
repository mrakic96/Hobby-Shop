<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware ('auth');
    }
    public function index()
    {
        $users = User::paginate(6);
        return view('adminpanel.users.index')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        if(Gate::denies('edit-users')){
            return redirect()->route('adminpanel.users.index');
        }
        $roles = Role::all();
        
        return view('adminpanel.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        
        if(Gate::allows('edit-roles')) {
            $user->roles()->sync($request->roles);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if($user->save()){
            $request->session()->flash('success','Korisnik "'. $user->name. '" je ažuriran.');
        }else{
            $request->session()->flash('error', 'Došlo je do greške pri ažuraciji.');
        }

        return redirect()->route('adminpanel.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect()->route('adminpanel.users.index');
        }
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('adminpanel.users.index');
    }
}
