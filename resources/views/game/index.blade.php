@extends('layouts.app')

@section('content')

<div class="row">
@include('partials._messages')
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Create Game</div>
            <div class="panel-body">
                {!! Form::open(array('route' => 'game.store','data-parsley-validate'=>'')) !!}

                    {{Form::label('name','Game Name:')}}
                    {{Form::text('name',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}

                    {{Form::label('teama_id','Team A Name:')}}
                    <select class="form-control" name="teama_id">
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('teamb_id','Team B Name:')}}
                    <select class="form-control" name="teamb_id">
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('stadium_id','Stadium Name:')}}
                    <select class="form-control" name="stadium_id">
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('type_id','Game Type:')}}
                    <select class="form-control" name="type_id">
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('ampaira_id','Ampair Name:')}}
                    <select class="form-control" name="ampaira_id">
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('coach','Coach Name:')}}
                    <select class="form-control" name="coach">
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('city_id','Coach Name:')}}
                    <select class="form-control" name="city_id">
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('predict_id','Prediction:')}}
                    <select class="form-control" name="predict_id">
                        <option value=1>dsfhbg</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('owned_id','Game Owner:')}}
                    <select class="form-control" name="owned_id">
                        <option value="1">sadkj</option>
                        <option value="2">sadkj</option>
                        <option value="3">sadkj</option>
                    </select>

                    {{Form::label('image','Image:')}}
                    {{Form::file('image')}}


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