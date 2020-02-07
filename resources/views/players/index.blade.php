@extends('layouts.dashboard2')

@section('content')
    <div class="col-12 col-lg-6 mx-auto">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <a class="btn btn-success botaohover" href="{{ URL::to('players/create') }}">Create a Player</a>
    <br>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Time</th>
            <th>Cartão</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($players as $player)
            {{--@php--}}
                {{--$date=date('Y-m-d', $team['date']);--}}
            {{--@endphp--}}
            <tr>
                <td>{{$player['id']}}</td>
                <td>{{$player['nome']}}</td>
                <td>{{$time = App\Team::find($player['teams_id'])->nome}}</td>
                <td>{{$player['cartao']}}</td>

                <td><a href="{{action('PlayerController@edit', $player['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('PlayerController@destroy', $player['id'])}}" method="post">
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