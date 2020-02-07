<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InfoGoalApiController extends Controller
{
    public function show($id)
    {
        $gols=DB::table('players')
        ->leftjoin('infogoals', 'infogoals.players_id', '=', 'players.id')
        ->where('infogoals.games_id', '=', $id)
        ->select('infogoals.players_id AS id', DB::raw('SUM(infogoals.quantidade) AS gols'), 'players.nome AS nome')
        ->groupBy('players.id')
        ->orderByRaw(DB::raw('SUM(infogoals.quantidade) DESC'))
        ->get();
        return  response()->json($gols);
    }
}
