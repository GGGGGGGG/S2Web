<?php

namespace App\Http\Controllers;

use App\Match;
use App\Playerinfo;
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
        return view('stats.index')->with('users', $users);
    }

    public function search(Request $request)
    {
        $users = null;
        if(request('keyword') != '')
        {
            $users = User::where('username', 'LIKE', '%'.request('keyword').'%')->get();
        }

        return view('stats.index')->with('users', $users);
    }

    public function leaderboard()
    {
        $sf = Playerinfo::where('sf', '>', 0)->orderBy('sf', 'desc')->take(20)->get();

        return view('stats.leaderboard')->with('sf', $sf);
    }
}
