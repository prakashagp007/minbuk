<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h3 class="mb-4 fw-semibold">✏️ Edit Book</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Book Name</label>
                    <input type="text" name="bookname" class="form-control"
                        value="{{ old('bookname', $book->bookname) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Author</label>
                    <input type="text" name="author" class="form-control"
                        value="{{ old('author', $book->author) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Reference</label>
                    <input type="text" name="reference" class="form-control"
                        value="{{ old('reference', $book->reference) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pages Count</label>
                    <input type="number" name="pages_count" class="form-control"
                        value="{{ old('pages_count', $book->pages_count) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Book ID</label>
                    <input type="text" name="book_id" class="form-control"
                        value="{{ old('book_id', $book->book_id) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Language</label>
                    <select name="language_id" class="form-select" required>
                        <option value="">Select Language</option>
                        @foreach ($languages as $lang)
                            <option value="{{ $lang->id }}"
                                {{ $book->language_id == $lang->id ? 'selected' : '' }}>
                                {{ $lang->language_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">PDF Link</label>
                    <input type="url" name="pdf_link" class="form-control"
                        value="{{ old('pdf_link', $book->pdf_link) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Current Image</label><br>
                    @if ($book->image)
                        <img src="{{ asset($book->image) }}" width="100" height="100" style="object-fit:cover;">
                    @else
                        <p>No image uploaded</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Change Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Update Book</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
