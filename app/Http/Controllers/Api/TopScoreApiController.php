<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TopScoreApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topscore=DB::table('players')
        ->leftjoin('infogoals', 'infogoals.players_id', '=', 'players.id')
        ->where('infogoals.quantidade', '>', 0)
        ->select('infogoals.players_id AS id', DB::raw('SUM(infogoals.quantidade) AS gols'), 'players.nome AS nome')
        ->groupBy('players.id')
        ->orderByRaw(DB::raw('SUM(infogoals.quantidade) DESC'))
        ->get();
        
        return response()->json($topscore);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=\App\Team::all();
        return view('players.create')->with(compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->validate([

            'name' => 'required',
            'team' => 'required'

        ], [
            'name.required' => 'Nome do Jogador.',
            'team.required' => 'Time.'

        ]);
        $player = new \App\Player;
        $player->nome=$request->get('name');
        $player->teams_id=$request->get('team');
        $player->cartao=$request->get('cartao');
        $player->save();
        return redirect('/players')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams=\App\Team::all();
        $player = \App\Player::find($id);
        return view('players.edit')->with(compact('player','id'))->with(compact('teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = request()->validate([

            'nome' => 'required',
            'teams_id' => 'required'

        ], [
            'nome.required' => 'Nome do Jogador.',
            'teams_id.required' => 'Time.'

        ]);
        $player= \App\Player::find($id);
        $player->nome=$request->get('name');
        $player->teams_id=$request->get('team');
        $player->cartao=$request->get('cartao');
        $player->save();
        return redirect('/players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = \App\Player::find($id);
        $team->delete();
        return redirect('/players')->with('success','Information has been  deleted');
    }
}
