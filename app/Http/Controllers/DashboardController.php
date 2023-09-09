<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reimburse;
use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        switch (auth()->user()->level->level) {
            case 'Staff':
                $data = [
                    'pending' => Reimburse::where('user_id', auth()->user()->id)->where('status_id', 1)->get()->count(),
                    'accepted' => Reimburse::where('user_id', auth()->user()->id)->where('status_id', 2)->get()->count(),
                    'declined' => Reimburse::where('user_id', auth()->user()->id)->where('status_id', 3)->get()->count(),
                    'paid' => Reimburse::where('user_id', auth()->user()->id)->where('status_id', 4)->get()->count()
                ]; 
                break;
            case 'Directur':
                $data = [
                    'pending' => Reimburse::where('status_id', 1)->get()->count(),
                    'accepted' => Reimburse::where('status_id', 2)->get()->count(),
                    'declined' => Reimburse::where('status_id', 3)->get()->count(),
                    'paid' => Reimburse::where('status_id', 4)->get()->count()
                ]; 
                break;
            case 'Finance':
                $data = [
                    'pending' => Reimburse::where('status_id', 1)->get()->count(),
                    'accepted' => Reimburse::where('status_id', 2)->get()->count(),
                    'declined' => Reimburse::where('status_id', 3)->get()->count(),
                    'paid' => Reimburse::where('status_id', 4)->get()->count()
                ]; 
                break;
            default:
                $data = [
                    'pending' => Reimburse::where('user_id', auth()->user()->id)->where('status_id', 1)->get()->count(),
                    'accepted' => Reimburse::where('user_id', auth()->user()->id)->where('status_id', 2)->get()->count(),
                    'declined' => Reimburse::where('user_id', auth()->user()->id)->where('status_id', 3)->get()->count(),
                    'paid' => Reimburse::where('user_id', auth()->user()->id)->where('status_id', 4)->get()->count()
                ]; 
                break;
        }

        $title = "Dashboard";
        
        return view('dashboard', [
            'title' => $title,
            'data' => $data
        ]);
    }

    public function profile(User $user)
    {
        return view('profile.index', [
            'user' => $user
        ]);
    }

    public function editprofile(User $user)
    {
        return view('profile.edit', [
            'user' => $user,
            'levels' => Level::all()
        ]);
    }

    public function updateprofile(Request $request, User $user)
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
        return redirect('/profile/'.$user->id)->with('success', 'Profile has been updated!');
    }
}
