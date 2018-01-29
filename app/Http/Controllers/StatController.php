<?php

namespace App\Http\Controllers;

use App\Match;
use App\Playerinfo;
use App\Playerstat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use App\Actionplayer;
use App\Http\Requests\StatRequest;
use Illuminate\Support\Facades\Cache;

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

    public function leaderboards()
    {
        $sf = Cache::remember('sf', 240, function () {
            return Playerinfo::where('sf', '>', 0)->orderBy('sf', 'desc')->take(20)->get();
        });

        $hp_healed = Cache::remember('hp_healed', 240, function () {
            return Playerstat::where('hp_healed', '>', 0)->orderBy('hp_healed', 'desc')->take(20)->get();
        });

        $bdmg = Cache::remember('bdmg', 240, function () {
            return Playerstat::where('bdmg', '>', 0)->orderBy('bdmg', 'desc')->take(20)->get();
        });

        $hp_repaired = Cache::remember('hp_repaired', 240, function () {
            return Playerstat::where('hp_repaired', '>', 0)->orderBy('hp_repaired', 'desc')->take(20)->get();
        });

        $kills = Cache::remember('kills', 240, function () {
            return Playerstat::where('kills', '>', 0)->orderBy('kills', 'desc')->take(20)->get();
        });

        $assists = Cache::remember('assists', 240, function () {
            return Playerstat::where('assists', '>', 0)->orderBy('assists', 'desc')->take(20)->get();
        });

        $npc = Cache::remember('npc', 240, function () {
            return Playerstat::where('npc', '>', 0)->orderBy('npc', 'desc')->take(20)->get();
        });


        return view('stats.leaderboards', compact('sf', 'hp_healed', 'bdmg', 'hp_repaired', 'kills',
            'assists', 'npc'));
    }
}
