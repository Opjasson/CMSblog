@extends('layouts.dashboard.dashboard-layout')

@section('title', 'Tags')

@section('breadcrumb')
    {{ Breadcrumbs::render('db-tags') }}
@endsection

@section('content')
    Tag list
@endsection