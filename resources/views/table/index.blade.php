@extends('layouts.dashboard2')

@section('content')
    <div class="col-12 col-lg-5 mx-auto">
@php
use App\Http\Controllers\GameController;
$funcao = new GameController();
$funcao->atualizarplacar();
@endphp

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Time</th>
            <th>V</th>
            <th>Pro</th>
            <th>Con</th>
            <th>S</th>
            <th>P</th>
        </tr>
        </thead>
        <tbody>

        @foreach($table as $times)
            {{--@php--}}
                {{--$date=date('Y-m-d', $team['date']);--}}
            {{--@endphp--}}
            <tr>
                <td>{{$times->nome}}</td>
                <td>{{$times->vitorias}}</td>
                <td>{{$times->gols_pro}}</td>
                <td>{{$times->gols_con}}</td>
                <td>{{$times->saldo}}</td>
                <td>{{$times->pontos}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    @endsection