@extends('layouts.dashboard2')

@section('content')
    <div class="col-12 col-lg-5 mx-auto">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
        <a class="btn btn-success botaohover" href="{{ URL::to('teams/create') }}">Create a new Team</a>
        <br>
        <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>V</th>
            <th>Pro</th>
            <th>Con
            <th>S</th>
            <th>P</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($teams as $team)
            {{--@php--}}
                {{--$date=date('Y-m-d', $team['date']);--}}
            {{--@endphp--}}
            <tr>
                <td>{{$team['id']}}</td>
                <td>{{$team['nome']}}</td>
                <td>{{$team['vitorias']}}</td>
                <td>{{$team['gols_pro']}}</td>
                <td>{{$team['gols_con']}}</td>
                <td>{{$team['saldo']}}</td>
                <td>{{$team['pontos']}}</td>

                <td><a href="{{action('TeamController@edit', $team['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('TeamController@destroy', $team['id'])}}" method="post">
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