@extends('layouts.dashboard.dashboard-layout')

@section('title', 'Tags')

@section('breadcrumb')
    {{ Breadcrumbs::render('db-tags') }}
@endsection

@section('content')
<div class="card">
   <div class="card-header">
      <div class="d-flex">
         <div class="flex-grow-1">
            <!-- Action create -->
            <a href="{{ $route['create'] }}" class="btn btn-primary">Create</a>
         </div>
         <div>
            <form class="d-flex" role="search" action="{{ $route['search'] }}" method="GET">
               <input name="q" value="{{ $queryString['q'] }}" class="form-control me-2" type="search"
                  placeholder="Search..." aria-label="Search">
               <button class="btn btn-primary" type="submit">
                  <x-icon.bs-icon name="bi-search"/>
               </button>
            </form>
         </div>
      </div>
   </div>
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
                     {{-- data-route berfungsi untuk mengarahkan ke halaman lain ketika diklik --}}
                      <button data-route="{{ route('dashboard.tag.edit', ['slugId' => $tag->id]) }}" type="button" id="buttonEdit" class="btn btn-primary">Edit</button>
                      <button data-route="{{ route('dashboard.tag.delete', ['slugId' => $tag->id]) }}" type="button" id="buttonDelete" class="btn btn-danger">Delete</button>
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
    <form id="formDeleteTag" action="" method="POST">
      @csrf
      @method('DELETE')
    </form>

 </div>
@endsection

@push('script-internal')
    {{--  --}}
    @vite('resources/js/views/dashboards/tag/index.view.js')
@endpush
