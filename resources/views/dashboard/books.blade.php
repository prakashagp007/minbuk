<h5 class="fw-semibold mb-4">Manage Books</h5>

<form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Book Name</label>
            <input type="text" name="bookname" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="col-md-4">
            <label class="form-label">Reference</label>
            <input type="text" name="reference" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Pages Count</label>
            <input type="number" name="pages_count" class="form-control">
        </div>
        <div class="col-md-3">
            <label class="form-label">Book Description</label>
            <input type="text" name="book_id" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">Select Category</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Language</label>
            <select name="language_id" class="form-select" required>
                <option value="">Select Language</option>
                @foreach ($languages as $lang)
                    <option value="{{ $lang->id }}">{{ $lang->language_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">PDF Link</label>
            <input type="url" name="pdf_link" class="form-control">
        </div>
        <div class="col-12">
            <button class="btn btn-primary mt-3">Add Book</button>
        </div>
    </div>
</form>

<hr>

<h6>Existing Books</h6>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Book</th>
            <th>Author</th>
            <th>Category</th>
            <th>Language</th>
            <th>Pages</th>
            <th>Image</th>
            <th>PDF</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $i => $book)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $book->bookname }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category->name ?? '-' }}</td>
                <td>{{ $book->language->language_name ?? '-' }}</td>
                <td>{{ $book->pages_count }}</td>
                <td>
                    @if ($book->image)
                        <img src="{{ asset($book->image) }}" width="60" height="60" style="object-fit:cover;">
                    @endif
                </td>
                <td>
                    @if ($book->pdf_link)
                        <a href="{{ $book->pdf_link }}" target="_blank">View</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-light btn-sm"><i
                            class="fa-solid fa-user-pen text-warning"></i></a>
                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-light btn-sm" onclick="return confirm('Delete this book?')"><i
                                class="fa-solid text-danger fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
