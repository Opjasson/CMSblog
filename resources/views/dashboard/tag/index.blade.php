@extends('layouts.dashboard.dashboard-layout')

@section('title', 'Tags')

@section('breadcrumb')
    {{ Breadcrumbs::render('db-tags') }}
@endsection

@section('content')
<div class="card">
    <div class="card-body">
       <table class="table table-hover table-bordered table-hover">
          <thead>
             <tr>
                <th>Tag</th>
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
             @foreach ($tags as $tag)
                <tr>
                   <td>{{ $tag->title }}</td>
                   <td>
                      <button type="button" class="btn btn-primary">Edit</button>
                      <button type="button" class="btn btn-danger">Delete</button>
                   </td>
                </tr>
             @endforeach
          </tbody>
       </table>
    </div>
    <div class="card-footer">
      {{-- Cara pertama untuk menampilkan paginator laravel menggunakan php artisan vendor:publish --}}
      {{-- {{ $tags->links('pagination::bootstrap-5') }} --}}
      {{-- Cara kedua untuk menampilkan paginator menggunakan class provider --}}
      {{ $tags->links() }}
    </div>
 </div>
@endsection
