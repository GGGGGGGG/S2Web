<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
        $user_matches = $user->actionplayers()->orderBy('match_id', 'desc')->paginate(10);

        $avg_comm = Cache::remember('avg_comm_'.$user->id, 240, function () use ($user) {
            return Vote::where('comm_id', $user->id)->avg('vote');
        });

        return view('user.show', compact('user', 'user_matches', 'avg_comm'));
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
