<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::filter(request(['level']))->get(),
            'levels' => Level::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', [
            'levels' => Level::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->file('image')->store('post-images');
        $validatedData = $request->validate([
            'nip' => 'required|max:255',
            'level_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'username' => 'required|min:3|max:255|unique:users',
            'image' => 'file|image|max:2048',
            'password' => 'required|min:5|max:255'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('user-image');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'New user has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'levels' => Level::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nip' => 'required|max:255',
            'level_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email'
        ];

        if($request->username != $user->username){
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }

        $validatedData = $request->validate($rules);
        if($request->password){
            $validatedData['password'] = Hash::make($request->password);
        }

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('user-image');
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User has been deleted!');
    }
}
