<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogos = DB::table('games')
            ->leftjoin('teams AS t1', 't1.id', '=', 'games.teams_casa')
            ->leftjoin('teams AS t2', 't2.id', '=', 'games.teams_visitante')
            ->select('games.id AS id_jogo', 'games.data AS data', 't1.nome AS time_casa',
                't1.sigla AS sigla_casa', 't2.nome AS time_visitante', 't2.sigla AS sigla_visitante',
                'games.placar_casa AS placar_casa', 'games.placar_visitante AS placar_visitante')
            ->orderByRaw('id_jogo DESC')
            ->paginate(10);
        return response()->json($jogos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams=\App\Team::all();
        return view('games.create')->with(compact('teams'));
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

            'data' => 'required',

            'placar_casa' => 'required',

            'placar_visitante' => 'required',

            'time_casa' => 'required',

            'time_visitante' => 'required'

        ], [

            'data.required' => 'Data.',
            'placar_casa.required' => 'Placar Casa.',
            'placar_visitante.required' => 'Placar Visitante.',
            'time_casa.required' => 'Time Casa.',
            'time_visitante.required' => 'Time Visitante.'

        ]);


        $game = new \App\Game;
        $game->data=$request->get('data');
        $game->placar_casa=$request->get('placar_casa');
        $game->placar_visitante=$request->get('placar_visitante');
        $game->teams_casa=$request->get('time_casa');
        $game->teams_visitante=$request->get('time_visitante');
        $game->save();
        return redirect('/games')->with('success', 'A informação foi adicionada');
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
        $game = \App\Game::find($id);
        return view('games.edit')->with(compact('game','id'))->with(compact('teams'));
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

            'data' => 'required',

            'placar_casa' => 'required',

            'placar_visitante' => 'required',

            'time_casa' => 'required',

            'time_visitante' => 'required'

        ], [

            'data.required' => 'Data.',
            'placar_casa.required' => 'Placar Casa.',
            'placar_visitante.required' => 'Placar Visitante.',
            'time_casa.required' => 'Time Casa.',
            'time_visitante.required' => 'Time Visitante.'

        ]);
        $game= \App\Game::find($id);
        $game->data=$request->get('data');
        $game->placar_casa=$request->get('placar_casa');
        $game->placar_visitante=$request->get('placar_visitante');
        $game->teams_casa=$request->get('time_casa');
        $game->teams_visitante=$request->get('time_visitante');
        $game->save();
        return redirect('/games');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = \App\Game::find($id);
        $game->delete();
        return redirect('/games')->with('success','Information has been  deleted');
    }

    public function addgoljogo($id){

        $teams=\App\Team::all();
        $players=\App\Player::all();
        $game = \App\Game::find($id);
        $infogoals = \App\InfoGoal::all();
        return view('games.addgoljogo')->with(compact('game','id'))->with(compact('teams'))->with(compact('players'))->with(compact('infogoals'));
    }
    public function atualizarplacar()
    {

        $teams = \App\Team::all();
        foreach ($teams as $team){
            $games = DB::table('games')
                ->select('*')
                ->orderByraw('id ASC')
                ->get();
            $gols_pro = 0;
            $gols_con = 0;
            $pontos_time = 0;
            $vitorias = 0;
            foreach ($games as $game){
//                echo '<br>';
//                echo 'time casa: '.$game->teams_casa.' placar casa: '.$game->placar_casa;
//                echo ' placar visitante: '.$game->placar_visitante.' time visitante: '.$game->teams_visitante.'<br>';

                if($game->teams_casa == $team->id){
                    if(($game->placar_casa) > ($game->placar_visitante)){
                        $pontos_time = $pontos_time + 3;
                        $vitorias = $vitorias + 1;
                    }
                    if(($game->placar_casa) < ($game->placar_visitante)){
                        $pontos_time = $pontos_time + 0;
                    }
                    if(($game->placar_casa) == ($game->placar_visitante)){
                        $pontos_time = $pontos_time + 1;
                    }
                    $gols_pro = $gols_pro + $game->placar_casa;
                    $gols_con = $gols_con + $game->placar_visitante;
                }
                elseif ($game->teams_visitante == $team->id){
                    if(($game->placar_casa) < ($game->placar_visitante)){
                        $pontos_time = $pontos_time + 3;
                        $vitorias = $vitorias + 1;
                    }
                    if(($game->placar_casa) > ($game->placar_visitante)){
                        $pontos_time = $pontos_time + 0;
                    }
                    if(($game->placar_casa) == ($game->placar_visitante)){
                        $pontos_time = $pontos_time + 1;
                    }
                    $gols_pro = $gols_pro + $game->placar_visitante;
                    $gols_con = $gols_con + $game->placar_casa;
//                    echo '<br><br><br>';
//                    echo 'Gols Con'.$game->placar_casa;
                }
            }

            $saldo = $gols_pro - $gols_con;
            $time=\App\Team::find($team->id);
            $time->vitorias = $vitorias;
            $time->gols_pro = $gols_pro;
            $time->gols_con = $gols_con;
            $time->saldo = $saldo;
            $time->pontos = $pontos_time;
            $time->save();
        }
//        foreach ($teams as $team){
//            $games = DB::table('games')
//                ->select('*')
//                ->where('teams_visitante', $team->id)
//                ->orderByRaw('id ASC')
//                ->get();
//            $gols_pro = 0;
//            $gols_con = 0;
//            $pontos_time = 0;
//            $vitorias = 0;
//            foreach ($games as $game){
//                echo '<br>';
//                echo 'time: '.$game->teams_casa.' placar: '.$game->placar_casa;
//                echo ' placar: '.$game->placar_visitante.' time: '.$game->teams_visitante.'<br>';
//
//                $gols_pro = $gols_pro + $game->placar_visitante;
//                $gols_con = $gols_con + $game->placar_casa;
//            }
//
//            $saldo = $gols_pro - $gols_con;
//            $time=\App\Team::find($team->id);
//            $time->vitorias = $vitorias;
//            $time->gols_pro = $gols_pro;
//            $time->gols_con = $gols_con;
//            $time->saldo = $saldo;
//            $time->pontos = $pontos_time;
//            $time->save();
//        }
    }
}
