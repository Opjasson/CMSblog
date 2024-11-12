@extends('layouts.dashboard.dashboard-layout')

@section('title', 'Dashboard page')
@section('content')
    <form action="{{ route('auth.logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection