<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index',compact('users'));
    }

    /**
     * Display a listing of trashed.
    */
    public function archive()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.archive',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email',
            'role'=>'required|integer|exists:roles,id|gt:0',
            'password'=>['required','confirmed',Password::min(8)],
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role_id'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('admin.index')->with('sucess','User has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email',
            'role'=>'required|integer|exists:roles,id|gt:0',
            'password'=>['required','confirmed',Password::min(8)],
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role_id'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('admin.index')->with('sucess','user:'.$user->name.' has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('sucess','User has been deleted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function forceDelete(User $user)
    {
        $user->forceDelete();
        return redirect()->route('admin.archive')->with('sucess','User has been deleted');
    }
    public function restore(User $user)
    {
        $user->restore();
        return redirect()->route('admin.archive')->with('sucess','User has been restored');
    }
}
