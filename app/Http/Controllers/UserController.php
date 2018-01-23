<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user_matches = $user->actionplayers()->orderBy('match', 'desc')->paginate(10);
        return view('user.show')->with('user', $user)->with('user_matches', $user_matches);
    }

    public function edit()
    {
        return view('user.edit')->with('user', Auth::user());
    }

    public function update(UserRequest $request)
    {
        $user = Auth::user();

        if (Hash::check(request('current_password'), $user->password)) {
            if (request('password') != '')
            {
                $user->password = Hash::make(request('password'));
            }

            $user->email = request('email');
            $user->save();

            return redirect()->back()->with('success', 'Your account has been updated.');
        } else {
            return redirect()->back()->with('failure', 'Your account was not updated.');
        }
    }

    public function banned()
    {
        return view('banned');
    }
}
