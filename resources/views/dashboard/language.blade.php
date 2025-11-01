@extends('layout.app')

@section('content')
    <div class="container py-5">
        <h3 class="mb-4">Manage Languages</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add Language Form -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form action="{{ route('language.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-5">
                            <input type="text" name="language_name" class="form-control"
                                placeholder="Language Name (e.g. English)" required>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="language_code" class="form-control"
                                placeholder="Code (e.g. en, ta, hi)" required>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Language Table -->
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $index => $lang)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lang->language_name }}</td>
                                <td>{{ $lang->language_code }}</td>
                                <td>{{ $lang->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('language.edit', $lang->id) }}" class="btn btn-sm btn-light"><i
                                            class="fa-solid fa-user-pen text-warning"></i></a>

                                    <form action="{{ route('language.delete', $lang->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete this language?')"
                                            class="btn btn-sm btn-light"><i
                                                class="fa-solid text-danger fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
