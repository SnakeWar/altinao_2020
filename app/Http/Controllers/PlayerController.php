<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players=\App\Player::all();
        $teams=\App\Team::all();
        return view('players.index')->with(compact('players'))->with(compact('teams'));
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
