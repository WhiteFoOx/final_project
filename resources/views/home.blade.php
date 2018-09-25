@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <div class="container">
            {!! Form::open(array('url' => 'submit')) !!}
            {{ csrf_field() }}
                <div class="form-group">
                    {{Form::label('sender', 'Пользователь который совершает перевод')}}
                    {{Form::text('sender', '', ['class' => 'form-control', 'placeholder' => 'Введите id пользователя который планирует перевод'])}}
                </div>
                <div class="form-group">
                    {{Form::label('money', 'Сумма перевода')}}
                    {{Form::text('money', '', ['class' => 'form-control', 'placeholder' => 'Введите сумму денег в рублях'])}}
                </div>
                <div class="form-group">
                    {{Form::label('getter', 'Пользователь который получает перевод')}}
                    {{Form::text('getter', '', ['class' => 'form-control', 'placeholder' => 'Введите id пользователя который получает перевод'])}}
                </div>
                <div class="form-group">
                    {{Form::label('date', 'Выберите дату отправку')}}
                </div>
                <div class="form-group">
                    {{Form::text('date', '', ['class' => 'form-control'])}}
                </div>
                    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
        </div>
    </div>
    <script>
        const currentDate = new Date();
        $('#date').datetimepicker({
            format:'Y-m-d H:i:00',
            inline:true,
            minDate:'0',
            minTime:`${currentDate.getHours()+1}`,
            lang:'ru',
        });
    </script>
@endsection
