@extends('layouts.app')
@section('style')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            plugins: "link, image",
            menubar: false
        });
    </script>
@endsection
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Game: {{ $game->name }}</div>
            <div class="panel-body">
                {!! Form::model($game, ['route' => ['game.update', $game->id], 'method' => 'PUT', 'files'=>true]) !!}

                    {{Form::label('name','Game Name:')}}
                    {{Form::text('name',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                    <br>
                    {{ Form::label('teama_id', 'Team A:') }}
                    {{ Form::select('teama_id', $teams, null, ["class" => 'form-control']) }}
                    <br>
                    {{ Form::label('teamb_id', 'Team B:') }}
                    {{ Form::select('teamb_id', $teams, null, ["class" => 'form-control']) }}
                    <br>
                    {{Form::label('stadium_id','Stadium Name:')}}
                    {{Form::select('stadium_id',$stadiums,null,["class" => 'form-control'])}}
                    <br>
                    {{Form::label('type_id','Game Type:')}}
                    <select class="form-control" name="type_id">
                        <option value=""></option>
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>
                    <br>
                    {{Form::label('ampaira_id','Ampair Name:')}}
                    <select class="form-control" name="ampaira_id">
                        <option value=""></option>
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>
                    <br>
                    {{Form::label('city_id','Coach Name:')}}
                    <select class="form-control" name="city_id">
                        <option value=""></option>
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>
                    <br>
                    {{Form::label('predict_id','Prediction:')}}
                    <select class="form-control" name="predict_id">
                        <option value=""></option>
                        <option value=1>dsfhbg</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>
                    <br>
                    {{Form::label('owned_id','Game Owner:')}}
                    <select class="form-control" name="owned_id">
                        <option value=""></option>
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('image','Image:')}}
                    {{Form::file('image')}}


                    {{Form::label('des','Post Body:')}}
                    {{Form::textarea('des',null,array('class' => 'form-control'))}}

                    {{Form::submit('Update',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection