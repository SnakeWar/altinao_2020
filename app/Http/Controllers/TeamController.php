<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=\App\Team::all();
        return view('teams.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
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
            'sigla' => 'required|max:3',
            'logo' => 'max:250'

        ], [
            'name.required' => 'Nome do Time.',
            'sigla.required' => 'Sigla.',
            'sigla.max' => 'Máximo de 3 caracteres em Sigla.',
            'logo.max' => 'Máximo de 250 caracteres em Logo'

        ]);
        $team = new \App\Team;
        $team->nome=$request->get('name');
        $team->sigla=$request->get('sigla');
        $team->logo=$request->get('logo');
        $team->save();
        return redirect('/teams')->with('success', 'Information has been added');
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
        $team = \App\Team::find($id);
        return view('teams.edit',compact('team','id'));
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

            'name' => 'required',
            'sigla' => 'required'

        ], [
            'name.required' => 'Nome do Time.',
            'sigla.required' => 'Sigla.'

        ]);
        $team= \App\Team::find($id);
        $team->nome=$request->get('name');
        $team->sigla=$request->get('sigla');
        $team->logo=$request->get('logo');
        $team->save();
        return redirect('/teams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = \App\Team::find($id);
        $team->delete();
        return redirect('/teams')->with('success','Information has been  deleted');
    }
}
