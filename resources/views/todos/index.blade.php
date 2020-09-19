@extends('layouts.app')

@section('title', 'All todos')

@section('content')
    <div class="container">
            <div class="row pt-3 justify-content-center">
                <div class="card" style="width: 50%">
                    <div class="card-header text-center">
                        <h1>All Todos</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse ($todos as $todo)
                                <li class="list-group-item text-muted">
                                    {{ $todo->title }}
                                    <span class="float-right">
                                        <a href="/todos/{{ $todo->id }}/delete" style="color:#f44336"><i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                    <span class="float-right mr-2">
                                        <a href="/todos/{{ $todo->id }}/edit" style="color:#3fe430"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                    <span class="float-right mr-2">
                                        <a href="/todos/{{$todo->id}}" style="color: #00a2b6">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                </li>
                                @empty
                                    <p class="text-center"> No Todos. </p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection




