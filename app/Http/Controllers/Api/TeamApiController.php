<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TeamApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=\App\Team::all();
        return response()->json($teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teamplayers=DB::table('players')
        ->leftjoin('teams', 'teams.id', '=', 'players.teams_id')
        ->where('teams.id', '=', $id)
        ->select('players.id AS id', 'teams.nome AS time', 'players.nome AS jogador')
        ->orderByRaw('players.id ASC')
        ->get();
        return  response()->json($teamplayers);
    }
}
