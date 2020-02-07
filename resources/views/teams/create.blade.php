@extends('layouts.ce')
@section('content')
<div class="container">
    <h2>Create a new Team</h2><br/>

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

    <form method="post" action="{{url('teams')}}" enctype="multipart/form-data">
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
                <label for="Sigla">Sigla:</label>
                <input type="text" class="form-control" name="sigla">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Logo">Logo:</label>
                <textarea type="text" class="form-control" name="logo"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-2" style="margin-top:0px">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            <div class="form-group col-md-2" style="margin-top:0px">
            <a class="btn btn-danger" href="{{ URL::to('teams') }}">B a c k</a>
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