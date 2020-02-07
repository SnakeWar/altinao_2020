@extends('layouts.ce')
@section('content')
<div class="container">
    <h2>Create a new Player</h2><br/>

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

    <form method="post" action="{{url('players')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Name">Nome:</label>
                <input type="text" class="form-control" name="name">
            </div>
        </div>
            <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable >Time</lable>
                <select class="form-control" multiple id="exampleFormControlSelect2" style="margin-top:5px" name="team">
                    <option value="">Nenhum</option>
                    @foreach($teams as $team)
                        <option value="{{$team['id']}}">{{$team['nome']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-2" style="margin-top:5px">
                <button type="submit" class="btn btn-success">ADICIONAR</button>
            </div>
            <div class="form-group col-md-2" style="margin-top: 5px;px">
            <a class="btn btn-danger" href="{{ URL::to('players') }}">BACK</a>
            </div>
        </div>
    </form>
</div>
{{--<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
</script>--}}
@endsection