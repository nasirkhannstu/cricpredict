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
@include('partials._messages')
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Create Game</div>
            <div class="panel-body">
                {!! Form::open(array('route' => 'game.store','data-parsley-validate'=>'', 'files'=>true)) !!}

                    {{Form::label('name','Game Name:')}}
                    {{Form::text('name',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                    <br>
                    {{Form::label('teama_id','Team A Name:')}}
                    <select class="form-control" name="teama_id">
                        <option value=""></option>
                        @foreach( $teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    {{Form::label('teamb_id','Team B Name:')}}
                    <select class="form-control" name="teamb_id">
                        <option value=""></option>
                        @foreach( $teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    {{Form::label('stadium_id','Stadium Name:')}}
                    <select class="form-control" name="stadium_id">
                        <option value=""></option>
                        @foreach( $stadiums as $stadium)
                        <option value="{{ $stadium->id }}">{{ $stadium->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    {{Form::label('type_id','Game Type:')}}
                    <select class="form-control" name="type_id">
                        <option value=""></option>
                        @foreach( $types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    {{Form::label('starttime','Start Time:')}}
                    {{Form::text('starttime',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                    <br>
                    {{Form::label('ampire','Ampair Name:')}}
                    {{Form::text('ampire',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                    <br>
                    {{Form::label('city_id','City Name:')}}
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
                        @foreach( $types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    {{Form::label('owned_id','Game Owner:')}}
                    <select class="form-control" name="owned_id">
                        <option value=""></option>
                        @foreach( $types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    {{Form::label('image','Image:')}}
                    {{Form::file('image')}}
                    <br>

                    {{Form::label('des','Post Body:')}}
                    {{Form::textarea('des',null,array('class' => 'form-control'))}}

                    {{Form::submit('Create Game',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">All Games ({{count( $games )}})</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($games as $game)
                        <tr>
                        <td><a href="{{route('game.edit', $game->id) }}">{{ $game->name }}</a></td>
                        <td>
                            
                            {{ Form::open(['route' => ['game.destroy', $game->id], 'method' => 'DELETE']) }}
                                {{ Form::submit('Delet', ['class' => 'btn btn-danger btn-sm']) }}
                            {{ Form::close() }}
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection