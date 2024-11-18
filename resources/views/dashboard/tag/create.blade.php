@extends('layouts.dashboard.dashboard-layout')
@section('title', 'Create tag')

@section('breadcrumb')
    {{ Breadcrumbs::render('db-tags-create') }}
@endsection

@section('content')
<div class="card">
    <div class="card-body">
       <form id="formTag" action="" method="POST">
          <label for="inputTitle" class="form-label">Title</label>
          <input name="title" type="text" id="inputTitle" class="form-control">
          <div id="textSlug" class="form-text">
             slug-title
          </div>
          <input name="slug" type="hidden" id="inputSlug">
       </form>
    </div>
    <div class="card-footer bg-white border-top-0">
       <div class="d-flex flex-row-reverse">
          <div class="gap-3">
            {{-- data-route berfungsi untuk mengarahkan ke halaman lain ketika diklik --}}
             <button data-route="{{ $route['back'] }}" id="buttonBack" type="button" class="btn btn-secondary">
                Back
             </button>
             <button id="buttonSave" type="button" class="btn btn-primary">
                Save
             </button>
          </div>
       </div>
    </div>
 </div>
@endsection


@push('script-internal')
    {{--  --}}
    @vite('resources/js/views/dashboards/tag/create.view.js')
@endpush