@extends('layouts.ce')
@section('content')
<div class="container">
    <h2>Editar Jogador</h2><br  />

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

    <form method="post" action="{{action('GameController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label>Data</label>
                <input type="text" class="form-control" data-date-format="dd/mm/yy" id="datepicker" value="{{$game->data}}" name="data">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label >Placar Casa</label>
                <input type="text" class="form-control" name="placar_casa" value="{{$game->placar_casa}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable >Time Casa</lable>
                <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px;" name="time_casa">
                    @foreach($teams as $team)
                        <option value="{{$team['id']}}" @if($team['id']==$game->teams_casa) selected @endif>{{$team['nome']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label >Placa Visitante</label>
                <input type="text" class="form-control" name="placar_visitante" value="{{$game->placar_visitante}}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable >Time Visitante</lable>
                <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px" name="time_visitante">
                    @foreach($teams as $team)
                        <option value="{{$team['id']}}" @if($team['id']==$game->teams_visitante) selected @endif>{{$team['nome']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-2" style="margin-top:0px">
                <button type="submit" class="btn btn-success" style="margin-left:38px">UPDATE</button>
            </div>
            <div class="form-group col-md-2" style="margin-top:0px">
                <a href="{{URL::to('games')}}" class="btn btn-danger" style="margin-left:38px">BACK</a>
            </div>
        </div>
    </form>
</div>
@endsection