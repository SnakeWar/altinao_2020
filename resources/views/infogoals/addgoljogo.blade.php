@extends('layouts.ce')
@section('content')
<div class="container">
    <h2 class="ali_centro">Adicionar Gol</h2><br/>

    @if ($errors->any())
        <div class="alert alert-danger">
            <h4>Campos obrigatórios</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{action('InfoGoalController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label>Quantidade de Gol(s)</label>
                <input type="text" class="form-control" name="quantidade">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label ><b>Jogador</b></label>
                <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px" name="jogador">
                    <option value="">Selecione</option>
                    @foreach($players as $player)
                        @if(($player['teams_id']==$game['teams_casa']) || ($player['teams_id']==$game['teams_visitante']))
                            <option value="{{$player['id']}}">{{$player['nome']}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-2" style="margin-top:5px">
                <button type="submit" class="btn btn-success">ADICIONAR</button>
            </div>
            <div class="form-group col-md-2" style="margin-top: 5px;">
                <a class="btn btn-danger" href="{{ URL::to('games') }}">BACK</a>
            </div>
        </div>
    </form>
    <div class="row">
    <div class="col-12 col-lg-8">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th class="ali_direita"></th>
            <th class="ali_direita"></th>
            <th class="ali_centro">Placar</th>
            <th></th>
            <th class="ali_esquerda"></th>
        </tr>
        </thead>
        <tbody>
            {{--@php--}}
            {{--$date=date('Y-m-d', $team['date']);--}}
            {{--@endphp--}}
            <tr>
                <td>{{$game['id']}}</td>
                <td>{{$game['data']}}</td>
                <td class="ali_direita">{{$team = App\Team::find($game['teams_casa'])->sigla}}</td>
                <td class="ali_direita">{{$game['placar_casa']}}</td>
                <th class="ali_centro">x</th>
                <td class="ali_esquerda">{{$game['placar_visitante']}}</td>
                <td>{{$team2 = App\Team::find($game['teams_visitante'])->sigla}}</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div class="col-12 col-lg-4">
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th>Nome</th>
            <th>Gol(s)</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {{--@php--}}
        {{--$date=date('Y-m-d', $team['date']);--}}
        {{--@endphp--}}
        @foreach($gols as $gol)
            @if($gol->games_id == $game['id'])
            <tr>
                <td></td>
                <td></td>
                <td>{{$nome = \App\Player::find($gol->players_id)->nome}}</td>
                <td>{{$gol->quantidade}}</td>
                <td></td>
                <td></td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>
@endsection