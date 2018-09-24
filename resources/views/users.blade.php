@extends('layouts.app')

@section('content')
    @if(count($users) > 0)
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Users list</h6>
        @foreach($users->all() as $user)
            <div class="media text-muted pt-3">
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <strong class="text-gray-dark">{{$user->id}}</strong>
                    </div>
                </div>
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <strong class="text-gray-dark">{{$user->name}}</strong>
                    </div>
                </div>
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <strong class="text-gray-dark">{{$user->balance}}</strong>
                    </div>
                </div>
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <strong class="text-gray-dark">{{$user->planning_balance ? $user->planning_balance : "Не было переводов"}}</strong>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
        <div class="jumbotron text-center">
            <h1>Пользователи отсутствуют</h1>
        </div>
    @endif
@endsection
