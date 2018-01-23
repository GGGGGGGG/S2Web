<?php

namespace App\Http\Controllers;

use App\Match;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use App\Actionplayer;
use App\Http\Requests\StatRequest;

class StatController extends Controller
{
    public function store(StatRequest $request)
    {
        $stats = Actionplayer::create($request->all());

        return response()->json($stats, 201);
    }

    public function index()
    {
        $users = null;
        $matches = null;
        return view('stats.index')->with('users', $users);
    }

    public function search(Request $request)
    {
        $users = null;
        $matches = null;
        if(request('keyword') != '')
        {
            $users = User::where('username', 'LIKE', '%'.request('keyword').'%')->get();
            $matches = Match::where('id', 'LIKE', '%'.request('keyword').'%')->get();
        }

        return view('stats.index')->with('users', $users);
    }

    public function leaderboard()
    {
        return view('stats.leaderboard');
    }
}
