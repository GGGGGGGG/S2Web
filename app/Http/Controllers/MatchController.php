<?php

namespace App\Http\Controllers;

use App\Actionplayer;
use App\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        if (request('keyword') != '') {
            $matches = Match::where('id', 'LIKE', '%' . request('keyword') . '%')->get();
        }

        return view('match.index')->with('matches', $matches)->with('last_matches', $last_matches);
    }

    public function show(Match $match)
    {

        $contributions = $this->contributions($match);
        $team_pdmg = $this->team_player_damage($match);
        $team_bdmg = $this->team_building_damage($match);
        $team_hp_healed = $this->team_hp_healed($match);
        $team_hp_repaired = $this->team_hp_repaired($match);
        $team_exp = $this->team_experience($match);
        $team_gold = $this->team_gold($match);
        $team_kills = $this->team_kills($match);
        $team_assists = $this->team_assists($match);
        $team_deaths = $this->team_deaths($match);
        $team_npc = $this->team_npc($match);

        $mostkills = Cache::remember('mostkills-'.$match->id, 240, function () use($match) {
            return Actionplayer::select('actionplayers.*')
                ->where('match_id', '=', $match->id)
                ->orderBy('kills', 'desc')->first();
        });

        $mostexp = Cache::remember('mostexp-'.$match->id, 240, function () use($match) {
            return Actionplayer::select('actionplayers.*')
                ->where('match_id', '=', $match->id)
                ->orderBy('exp', 'desc')->first();
        });

        $mostbdmg = Cache::remember('mostexp-'.$match->id, 240, function () use($match) {
            return Actionplayer::select('actionplayers.*')
                ->where('match_id', '=', $match->id)
                ->orderBy('bdmg', 'desc')->first();
        });

        $mosthphealed = Cache::remember('mosthphealed-'.$match->id, 240, function () use($match) {
            return Actionplayer::select('actionplayers.*')
                ->where('match_id', '=', $match->id)
                ->orderBy('hp_healed', 'desc')->first();
        });

        $mostnpckilled = Cache::remember('mostnpc-'.$match->id, 240, function () use($match) {
            return Actionplayer::select('actionplayers.*')
                ->where('match_id', '=', $match->id)
                ->orderBy('npc', 'desc')->first();
        });

        $leastnpckilled = Cache::remember('leastnpc-'.$match->id, 240, function () use($match) {
            return Actionplayer::select('actionplayers.*')
                ->where('match_id', '=', $match->id)
                ->orderBy('npc', 'asc')->first();
        });

        $mostdeaths = Cache::remember('mostdeaths-'.$match->id, 240, function () use($match) {
            return Actionplayer::select('actionplayers.*')
                ->where('match_id', '=', $match->id)
                ->orderBy('deaths', 'desc')->first();
        });

        $leastkills = Cache::remember('leastkills-'.$match->id, 240, function () use($match) {
            return Actionplayer::select('actionplayers.*')
                ->where('match_id', '=', $match->id)
                ->orderBy('kills', 'asc')->first();
        });

        $mostgold = Cache::remember('mostgold-'.$match->id, 240, function () use($match) {
            return Actionplayer::select('actionplayers.*')
                ->where('match_id', '=', $match->id)
                ->orderBy('gold', 'desc')->first();
        });



        return view('match.show', compact('match', 'contributions', 'team_pdmg', 'team_bdmg',
            'team_exp', 'team_gold', 'team_kills', 'team_hp_repaired', 'team_hp_healed', 'team_deaths', 'team_npc',
            'team_assists', 'mostkills', 'mostexp', 'mostbdmg', 'mosthphealed', 'mostnpckilled', 'leastnpckilled',
            'mostdeaths', 'leastkills', 'mostgold'
        ));
    }

    public function contributions(Match $match)
    {
        $contributions = array();

        foreach ($match->actionplayers as $actionplayer) {
            $data = \Lava::DataTable();

            $data->addStringColumn('Stats')
                ->addNumberColumn('Percent')
                ->addRow(['Player Damage', $actionplayer->pdmg])
                ->addRow(['Building Damage', $actionplayer->bdmg])
                ->addRow(['Healing Done', $actionplayer->hp_healed])
                ->addRow(['HP Repair', $actionplayer->hp_repaired]);

            $contributions[] = \Lava::PieChart('Contribution-' . $actionplayer->user->id, $data, [
                'title' => 'Your contribution in numbers',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $contributions;
    }

    public function team_player_damage(Match $match)
    {
        $team_pdmg = array();
        foreach ($match->teams as $team)
        {
            //team player damage
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->pdmg]);
            }


            $team_pdmg[] = \Lava::PieChart('Teampdmg-' . $team->id, $data, [
                'title' => 'Player damage per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_pdmg;
    }

    public function team_building_damage(Match $match)
    {
        $team_bdmg = array();
        foreach ($match->teams as $team)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->bdmg]);
            }


            $team_bdmg[] = \Lava::PieChart('Teambdmg-' . $team->id, $data, [
                'title' => 'Building Damage per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_bdmg;
    }

    public function team_hp_repaired(Match $match)
    {
        $team_hp_repaired = array();
        foreach ($match->teams as $team)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->hp_repaired]);
            }


            $team_hp_repaired[] = \Lava::PieChart('Teamhprepaired-' . $team->id, $data, [
                'title' => 'Building repair per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_hp_repaired;
    }

    public function team_hp_healed(Match $match)
    {
        $team_hp_healed = array();
        foreach ($match->teams as $team)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->hp_healed]);
            }


            $team_hp_healed[] = \Lava::PieChart('Teamhphealed-' . $team->id, $data, [
                'title' => 'Healing per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_hp_healed;
    }

    public function team_experience(Match $match)
    {
        $team_exp = array();
        foreach ($match->teams as $team)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->exp]);
            }


            $team_exp[] = \Lava::PieChart('Teamexp-' . $team->id, $data, [
                'title' => 'Experience per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_exp;
    }

    public function team_gold(Match $match)
    {
        $team_gold = array();
        foreach ($match->teams as $team)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->gold]);
            }


            $team_gold[] = \Lava::PieChart('Teamgold-' . $team->id, $data, [
                'title' => 'Gold per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_gold;
    }

    public function team_kills(Match $match)
    {
        $team_kills = array();
        foreach ($match->teams as $team)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->kills]);
            }


            $team_kills[] = \Lava::PieChart('Teamkills-' . $team->id, $data, [
                'title' => 'Kills per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_kills;
    }

    public function team_assists(Match $match)
    {
        $team_assists = array();
        foreach ($match->teams as $team)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->assists]);
            }


            $team_assists[] = \Lava::PieChart('Teamassists-' . $team->id, $data, [
                'title' => 'Assists per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_assists;
    }

    public function team_deaths(Match $match)
    {
        $team_deaths = array();
        foreach ($match->teams as $team)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->deaths]);
            }


            $team_deaths[] = \Lava::PieChart('Teamdeaths-' . $team->id, $data, [
                'title' => 'Deaths per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_deaths;
    }

    public function team_npc(Match $match)
    {
        $team_npc = array();
        foreach ($match->teams as $team)
        {
            $data = \Lava::DataTable();

            $data->addStringColumn('Player')
                ->addNumberColumn('Percent');
            foreach ($team->actionplayers as $actionplayer) {
                $data->addRow([$actionplayer->user->username, $actionplayer->npc]);
            }


            $team_npc[] = \Lava::PieChart('Teamnpc-' . $team->id, $data, [
                'title' => 'Npcs killed per player',
                'is3D' => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]

            ]);
        }

        return $team_npc;
    }
}
