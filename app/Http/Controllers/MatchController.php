<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('match.show')->with('match', $match);
    }
}
