<h5 class="fw-semibold mb-4">Manage Categories</h5>

<form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold">Category Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter category name" required>
        </div>
        <div class="col-md-6">
            <label class="form-label fw-semibold">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-12">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" rows="3" class="form-control" placeholder="Enter description"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary mt-2">Add Category</button>
        </div>
    </div>
</form>

<hr class="my-4">

<h6>Existing Categories</h6>
<table class="table table-bordered  mt-3">
    <thead class="table-secondary">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $index => $category)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    @if ($category->image)
                        <img src="{{ asset($category->image) }}" width="70" height="70"
                            style="object-fit:cover;">
                    @endif
                </td>
                <td>{{ $category->created_at->format('d M Y') }}</td>
                <td class="d-flex align-items-center gap-3">
                    <div>
                        <a class=" btn-sm btn-light btn" href="{{ route('category.edit', $category->id) }}"><i
                                class="fa-solid fa-user-pen text-warning"></i></a>
                    </div>
                    <div>
                        <form action="{{ route('category.delete', $category->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btn-sm btn-light btn"
                                onclick="return confirm('Are you sure you want to delete this category?')"><i
                                    class="fa-solid text-danger fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

