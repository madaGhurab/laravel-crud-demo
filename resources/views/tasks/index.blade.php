@extends('layouts.app')

@section('header')
    <h1 class="text-primary mb-4">Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">Create New Task</a>
@endsection

@section('content')
    <ul class="list-group">
        @foreach ($tasks as $task)
            <li class="list-group-item">
                <a href="{{ route('tasks.show', $task) }}" class="text-decoration-none text-dark">
                    {{ $task->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
