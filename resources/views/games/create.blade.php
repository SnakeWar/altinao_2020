@extends('layouts.ce')
@section('content')

<div class="container">
    <h2 class="ali_centro">Criar um novo jogo</h2><br/>

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

    <form method="post" action="{{url('games')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label>Data</label>
                <input type="text" class="form-control" data-date-format="dd/mm/yy" id="datepicker" name="data">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label >Time Casa</label>
                <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px" name="time_casa">
                    <option value="">Selecione</option>
                    @foreach($teams as $team)
                        <option value="{{$team['id']}}">{{$team['nome']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label >Placar Casa</label>
                <input type="text" class="form-control" name="placar_casa" value="">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label >Time Visitante</label>
                <select class="form-control" id="exampleFormControlSelect2" style="margin-top:5px" name="time_visitante">
                    <option value="">Selecione</option>
                    @foreach($teams as $team)
                        <option value="{{$team['id']}}">{{$team['nome']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label >Placa Visitante</label>
                <input type="text" class="form-control" name="placar_visitante" value="">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-2" style="margin-top:5px">
                <button type="submit" class="btn btn-success">ADICIONAR</button>
            </div>
            <div class="form-group col-md-2" style="margin-top: 5px">
            <a class="btn btn-danger" href="{{ URL::to('games') }}">BACK</a>
            </div>
        </div>
    </form>
</div>
@endsection
