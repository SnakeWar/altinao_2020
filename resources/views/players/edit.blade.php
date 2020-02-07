@extends('layouts.ce')
@section('content')
<div class="container">
    <h2>Edit a Player</h2><br  />

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

    <form method="post" action="{{action('PlayerController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" value="{{$player->nome}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable>Time</lable>
                <select class="form-control" id="exampleFormControlSelect1" style="margin-top:5px" name="team">
                    <option value=""  @if($player->teams_id=="") selected @endif>Nenhum</option>
                    @foreach($teams as $team)
                        <option value="{{$team['id']}}" @if($team['id']==$player->teams_id) selected @endif>{{$team['nome']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable >Cartão</lable>
                <select class="form-control" id="exampleFormControlSelect1" style="margin-top:5px" name="cartao">
                    <option value="Nenhum" @if($player->cartao=="Nenhum") selected @endif>Nenhum</option>
                    <option value="Amarelo" @if($player->cartao=="Amarelo") selected @endif>Amarelo</option>
                    <option value="2 Amarelos" @if($player->cartao=="2 Amarelos") selected @endif>2 Amarelos</option>
                    <option value="Vermelho" @if($player->cartao=="Vermelho") selected @endif>Vermelho</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-2" style="margin-top:0px">
                <button type="submit" class="btn btn-success" style="margin-left:38px">UPDATE</button>
            </div>
            <div class="form-group col-md-2" style="margin-top:0px">
                <a href="{{URL::to('players')}}" class="btn btn-danger" style="margin-left:38px">B A C K</a>
            </div>
        </div>
    </form>
</div>
@endsection