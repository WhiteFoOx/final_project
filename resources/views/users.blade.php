@extends('layouts.app')

@section('content')
    @if(count($users) > 0)
        <h2 class="sub-header">Список пользователей</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Имя пользователя</th>
                        <th>Текущий баланс</th>
                        <th>Дата последней запланированной транзакции</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users->all() as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->balance}}</td>
                        <td>{{$user->last_transaction ? $user->last_transaction : "Не было переводов" }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
        <div class="jumbotron text-center">
            <h2>Пользователи отсутствуют</h2>
        </div>
    @endif
@endsection
