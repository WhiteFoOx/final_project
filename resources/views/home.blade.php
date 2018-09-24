@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <div class="container">
            {!! Form::open(array('url' => 'submit')) !!}
                <div class="form-group">
                    {{Form::label('sender', 'User who sends')}}
                    {{Form::text('sender', '', ['class' => 'form-control', 'placeholder' => 'Enter user id who sends money'])}}
                </div>
                <div class="form-group">
                    {{Form::label('money', 'Money')}}
                    {{Form::text('money', '', ['class' => 'form-control', 'placeholder' => 'Enter amount of money'])}}
                </div>
                <div class="form-group">
                    {{Form::label('date', 'Enter date of otpravka')}}
                    {{Form::input('datetime-local', 'date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('getter', 'User who gets the money')}}
                    {{Form::text('getter', '', ['class' => 'form-control', 'placeholder' => 'Enter user id who get money'])}}
                </div>

                {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
