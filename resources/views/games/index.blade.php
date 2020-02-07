@extends('layouts.dashboard2')

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <div class="col-12 col-lg-8 mx-auto">
    <a class="btn btn-success botaohover" href="{{ URL::to('games/create') }}">Create a new Game</a>
    <br>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th class="ali_direita">Time Casa</th>
            <th class="ali_direita"></th>
            <th class="ali_centro">Placar</th>
            <th class="ali_esquerda"></th>
            <th class="ali_esquerda">Time Visitante</th>
            <th colspan="3" class="ali_centro">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($games as $game)
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
                <td class="ali_esquerda">{{$team = App\Team::find($game['teams_visitante'])->sigla}}</td>

                <td><a href="{{action('InfoGoalController@edit', $game['id'])}}" class="btn btn-success">Add Gol</a></td>
                <td><a href="{{action('GameController@edit', $game['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('GameController@destroy', $game['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection