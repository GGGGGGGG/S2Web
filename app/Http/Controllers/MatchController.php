<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;

class MatchController extends Controller
{
    public function index()
    {
        $matches = null;
        $last_matches = DB::table('matches')->orderBy('id', 'desc')->paginate(15);
        return view('match.index')->with('matches', $matches)->with('last_matches', $last_matches);
    }

    public function search(Request $request)
    {
        $matches = null;
        $last_matches = DB::table('matches')->orderBy('id', 'desc')->paginate(15);
        if(request('keyword') != '')
        {
            $matches = Match::where('id', 'LIKE', '%'.request('keyword').'%')->get();
        }

        return view('match.index')->with('matches', $matches)->with('last_matches', $last_matches);
    }

    public function show(Match $match)
    {

        foreach($match->actionplayers as $actionplayer)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Stats')
                ->addNumberColumn('Percent')
                ->addRow(['Player Damage', $actionplayer->pdmg])
                ->addRow(['Building Damage', $actionplayer->bdmg])
                ->addRow(['Healing Done', $actionplayer->hp_healed])
                ->addRow(['HP Repair', $actionplayer->hp_repaired]);

            $piechart[] = \Lava::PieChart('Contribution-'.$actionplayer->user->id, $data, [
                'title' => 'Your contribution in numbers',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);

        }

        return view('match.show', compact('match', 'piechart'));
    }
}
