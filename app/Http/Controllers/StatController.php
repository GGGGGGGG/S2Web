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
use Illuminate\Support\Facades\DB;

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
            return Playerinfo::select('playerinfos.*', DB::raw('count(actionplayers.account_id) as total'))
                ->where('playerinfos.sf', '>', 0)
                ->join('actionplayers', 'actionplayers.account_id', '=', 'playerinfos.account_id')
                ->groupBy('playerinfos.account_id')->orderBy('sf', 'desc')
                ->havingRaw('total >= 10')->take(20)->get();
        });

        $hp_healed = Cache::remember('hp_healed', 240, function () {
            return Playerstat::select('playerstats.*', DB::raw('count(actionplayers.account_id) as total, playerstats.hp_healed/playerstats.secs as hf'))
                ->join('actionplayers', 'actionplayers.account_id', '=', 'playerstats.account_id')
                ->groupBy('playerstats.account_id')->orderBy('hf', 'desc')
                ->havingRaw('total >= 10')->take(20)->get();
        });

        $bdmg = Cache::remember('bdmg', 240, function () {
            return Playerstat::select('playerstats.*', DB::raw('count(actionplayers.account_id) as total, playerstats.bdmg/playerstats.secs as bf'))
                ->join('actionplayers', 'actionplayers.account_id', '=', 'playerstats.account_id')
                ->groupBy('playerstats.account_id')->orderBy('bf', 'desc')
                ->havingRaw('total >= 10')->take(20)->get();
        });

        $hp_repaired = Cache::remember('hp_repaired', 240, function () {
            return Playerstat::select('playerstats.*', DB::raw('count(actionplayers.account_id) as total, playerstats.hp_repaired/playerstats.secs as rf'))
                ->join('actionplayers', 'actionplayers.account_id', '=', 'playerstats.account_id')
                ->groupBy('playerstats.account_id')->orderBy('rf', 'desc')
                ->havingRaw('total >= 10')->take(20)->get();
        });

        $kills = Cache::remember('kills', 240, function () {
            return Playerstat::select('playerstats.*', DB::raw('count(actionplayers.account_id) as total, playerstats.kills/playerstats.secs as kf'))
                ->join('actionplayers', 'actionplayers.account_id', '=', 'playerstats.account_id')
                ->groupBy('playerstats.account_id')->orderBy('kf', 'desc')
                ->havingRaw('total >= 10')->take(20)->get();
        });

        $assists = Cache::remember('assists', 240, function () {
            return Playerstat::select('playerstats.*', DB::raw('count(actionplayers.account_id) as total, playerstats.assists/playerstats.secs as af'))
                ->join('actionplayers', 'actionplayers.account_id', '=', 'playerstats.account_id')
                ->groupBy('playerstats.account_id')->orderBy('af', 'desc')
                ->havingRaw('total >= 10')->take(20)->get();
        });

        return view('stats.leaderboards', compact('sf', 'hp_healed', 'bdmg', 'hp_repaired', 'kills',
            'assists'));
    }
}
