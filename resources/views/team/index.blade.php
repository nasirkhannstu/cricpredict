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
<div class="container">
  @include('partials._messages')  
</div>
<div class="row">

    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">Create Team</div>
            <div class="panel-body">
                {!! Form::open(array('route' => 'team.store','data-parsley-validate'=>'', 'files'=>true)) !!}

                    {{Form::label('name','Team Name:')}}
                    {{Form::text('name',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('pla','Player 1:')}}
                            <select class="form-control" name="pla">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('plb','Player 2:')}}
                            <select class="form-control" name="plb">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('plc','Player 3:')}}
                            <select class="form-control" name="plc">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('pld','Player 4:')}}
                            <select class="form-control" name="pld">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('ple','Player 5:')}}
                            <select class="form-control" name="ple">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('plf','Player  6:')}}
                            <select class="form-control" name="plf">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('plg','Player  7:')}}
                            <select class="form-control" name="plg">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('plh','Player 8:')}}
                            <select class="form-control" name="plh">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('pli','Player 9:')}}
                            <select class="form-control" name="pli">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('plj','Player 10:')}}
                            <select class="form-control" name="plj">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('plk','Player 11:')}}
                            <select class="form-control" name="plk">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('pll','Player 12:')}}
                            <select class="form-control" name="pll">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('plm','Player 13:')}}
                            <select class="form-control" name="plm">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('pln','Player 14:')}}
                            <select class="form-control" name="pln">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('plo','Player 15:')}}
                            <select class="form-control" name="plo">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('plp','Player 16:')}}
                            <select class="form-control" name="plp">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('plq','Player 17:')}}
                            <select class="form-control" name="plq">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('plr','Player18:')}}
                            <select class="form-control" name="plr">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('coach','Team Coach:')}}
                            <select class="form-control" name="coach">
                                <option value=""></option>
                                <option value="1">sadkj</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('image','Image:')}}
                            {{Form::file('image')}}
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                    <br>

                    {{Form::label('desa','Post Body:')}}
                    {{Form::textarea('desa',null,array('class' => 'form-control'))}}

                    {{Form::submit('Create Team',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">All Teams ({{count( $teams )}})</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                        <tr>
                        <td><a href="{{route('team.edit', $team->id) }}">{{ $team->name }}</a></td>
                        <td>
                            
                            {{ Form::open(['route' => ['team.destroy', $team->id], 'method' => 'DELETE']) }}
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