@extends('layout.app')

@section('content')
<div class="container py-5">
    <h3>Edit Language</h3>

    <form action="{{ route('language.update', $language->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Language Name</label>
            <input type="text" name="language_name" class="form-control" value="{{ $language->language_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Language Code</label>
            <input type="text" name="language_code" class="form-control" value="{{ $language->language_code }}" required>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
