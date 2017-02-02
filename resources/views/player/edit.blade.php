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
            <div class="panel-heading">Stadium Name: {{ $stadium->name }}</div>
            <div class="panel-body">
                {!! Form::model($stadium, ['route' => ['stadium.update', $stadium->id], 'method' => 'PUT', 'files'=>true]) !!}

                    {{Form::label('name','Stadium Name:')}}
                    {{Form::text('name',null,array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('h1chase','First Bat: Highest Chase:')}}
                            {{Form::text('h1chase',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('h2chase','Last Bat: Highest Chase:')}}
                            {{Form::text('h2chase',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('l1chase','First Bat: Highest Chase:')}}
                            {{Form::text('l1chase',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('l2chase','Last Bat: Lowest Chase::')}}
                            {{Form::text('l2chase',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('location','Location:')}}
                            {{Form::text('location',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('coord','Coordinate:')}}
                            {{Form::text('coord',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('capacity','Capacity:')}}
                            {{Form::text('capacity',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('recordcap','Record Capacity:')}}
                            {{Form::text('recordcap',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('opened','Stablished:')}}
                            {{Form::text('opened',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label('fieldsize','Field Size:')}}
                            {{Form::text('fieldsize',null,array('class' => 'form-control','maxlength'=>'255'))}}
                        </div>
                        <div class="col-md-4">
                            {{Form::label('image','Stadium Image:')}}
                            {{Form::file('image')}}
                        </div>
                    </div>
                    {{Form::label('des','Post Body:')}}
                    {{Form::textarea('des',null,array('class' => 'form-control'))}}

                    {{Form::submit('Update Info',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top:20px'))}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection