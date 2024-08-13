@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
@endsection

@section('content')
    <p>Number of tasks: {{ $taskCount }}</p>
@endsection
