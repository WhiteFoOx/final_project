@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <div class="container">
            {!! Form::open(array('url' => 'add')) !!}
            <div class="form-group">
                {{Form::label('name', 'User name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter user name'])}}
            </div>
            <div class="form-group">
                {{Form::label('balance', 'Balance')}}
                {{Form::text('balance', '', ['class' => 'form-control', 'placeholder' => 'Enter user balance'])}}
            </div>

            {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
