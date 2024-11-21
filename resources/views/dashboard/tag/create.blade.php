@extends('layouts.dashboard.dashboard-layout')
@section('title', 'Create tag')

@section('breadcrumb')
    {{ Breadcrumbs::render('db-tags-create') }}
@endsection

@section('content')
<div class="card">
    <div class="card-body">
       <form id="formTag" action="{{ $form['action'] }}" method="POST">
         @csrf
         @method('POST')
          <label for="inputTitle" class="form-label">Title</label>
          <input name="title" value="{{ old('title') }}" type="text" id="inputTitle" @class([
            'form-control',
            'is-invalid' => isInvalidError('title')
        ]) >
          <div id="textSlug" class="form-text">
             {{ old('slug') }}
          </div>
          <input name="slug" type="hidden" id="inputSlug" value="{{ old('slug') }}">
          <x-error.invalid-feed-back fieldName="title"/>
       </form>
    </div>
    <div class="card-footer bg-white border-top-0">
       <div class="d-flex flex-row-reverse">
          <div class="gap-3">
            {{-- data-route berfungsi untuk mengarahkan ke halaman lain ketika diklik --}}
             <button data-route="{{ $form['back'] }}" id="buttonBack" type="button" class="btn btn-secondary">
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