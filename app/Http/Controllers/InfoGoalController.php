<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return redirect('infogoals.addgoljogo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $players=\App\Player::all();
        $game = \App\Game::find($id);
        $infogoals = \App\InfoGoal::all();
        $gols = DB::table('infogoals')
            ->select('*')
            ->get();
        return view('infogoals.addgoljogo')->with(compact('game','id'))->with(compact('teams'))->with(compact('players'))->with(compact('infogoals'))->with(compact('gols'));
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

            'jogador' => 'required',
            'quantidade' => 'required'

        ], [
            'jogador.required' => 'Nome Jogador.',
            'quantidade.required' => 'Quantidade.'

        ]);
        $infogoals= new \App\InfoGoal;
        $infogoals->players_id=$request->get('jogador');
        $infogoals->games_id=$id;
        $infogoals->quantidade=$request->get('quantidade');
        $infogoals->save();
        return redirect('games')->with(compact('id'))->with('success', 'Information has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
