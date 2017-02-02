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
            <div class="panel-heading">Player Name: {{ $player->name }}</div>
            <div class="panel-body">
                {!! Form::model($player, ['route' => ['player.update', $player->id], 'method' => 'PUT', 'files'=>true]) !!}

                    {{Form::label('name','Player Name:')}}
                    {{Form::text('name',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('born','Born:')}}
                            {{Form::text('born',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('year','Born Year:')}}
                            {{Form::text('year',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('type','Player Type:')}}
                            <select class="form-control" name="type">
                                <option value="Bats Man">Bat</option>
                                <option value="Bowler">Bowl</option>
                                <option value="All Rounder">Alrounder</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('batstyle','Batting Style:')}}
                            <select class="form-control" name="batstyle">
                                <option value="Right Handed">Left</option>
                                <option value="Left Handed">Right</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('bowlstyle','Location:')}}
                            <select class="form-control" name="bowlstyle">
                                <option value="Right Handed">Left</option>
                                <option value="Left Handed">Right</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('wickets','Wickets:')}}
                            {{Form::text('wickets',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('avgrun','Avarage Run Rate')}}
                            {{Form::text('avgrun',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('matchplayed','Match Played')}}
                            {{Form::text('matchplayed',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('image','Player Image:')}}
                            {{Form::file('image')}}
                        </div>
                    </div>
                    {{Form::label('des','Post Body:')}}
                    {{Form::textarea('des',null,array('class' => 'form-control'))}}

                    {{Form::submit('Update Info',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}
                {!! Form::close() !!}            </div>
        </div>
    </div>
</div>
@endsection