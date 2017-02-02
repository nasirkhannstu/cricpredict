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
            <div class="panel-heading">Create League</div>
            <div class="panel-body">
                {!! Form::open(array('route' => 'type.store','data-parsley-validate'=>'', 'files'=>true)) !!}
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('type','Game Type:')}}
                            <select class="form-control" name="type">
                                <option value="League">League</option>
                                <option value="International">International</option>
                                <option value="Home">Home</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{Form::label('name','League Name:')}}
                            {{Form::text('name',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('country','Country')}}
                            {{Form::text('country',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('format','Avarage Run Rate')}}
                            {{Form::text('format',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('firstmatch','First Match')}}
                            {{Form::text('firstmatch',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('recentchamp','Recent Champian')}}
                            {{Form::text('recentchamp',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('mostrun','Highest Run')}}
                            {{Form::text('mostrun',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('mostwicket','Highest Wicket')}}
                            {{Form::text('mostwicket',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('image','League Image:')}}
                            {{Form::file('image')}}
                        </div>
                    </div>
                    {{Form::label('des','Post Body:')}}
                    {{Form::textarea('des',null,array('class' => 'form-control'))}}

                    {{Form::submit('Create League',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">All Leagues ({{count( $types )}})</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($types as $type)
                        <tr>
                        <td><a href="{{route('type.edit', $type->id) }}">{{ $type->name }}</a></td>
                        <td>
                            
                            {{ Form::open(['route' => ['type.destroy', $type->id], 'method' => 'DELETE']) }}
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