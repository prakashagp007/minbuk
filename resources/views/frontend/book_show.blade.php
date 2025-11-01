@extends('layout.app')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
        }

        nav {
            background-color: #1f4566;
            color: white;
            font-weight: bold;
        }

        .book-container {
            background: #fff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .book-image {
            width: 220px;
            height: 300px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .book-title {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        .book-detail p {
            margin: 4px 0;
            color: #444;
            font-size: 15px;
        }

        .btn-preview {
            background-color: #46691e;
            color: white;
            font-weight: 500;
        }

        .btn-read {
            background-color: #18436d;
            color: white;
            font-weight: 500;
        }

        .btn-share {
            background-color: #c96b26;
            color: white;
            font-weight: 500;
        }

        .btn-preview:hover,
        .btn-read:hover,
        .btn-share:hover {
            opacity: 0.9;
        }

        .section-title {
            font-weight: 600;
            font-size: 18px;
            margin-top: 40px;
        }

        .info-table td {
            padding: 6px 10px;
            color: #555;
        }
    </style>

    <nav class="d-flex justify-content-between align-items-center px-5 py-3">
        <div>
            <img src="{{ asset('uploads/images/logo-removebg-preview.png') }}" width="50px" alt="">
        </div>

        <div class="d-flex gap-4 align-items-center text-white">
            <span><i class="fa-solid fa-magnifying-glass"></i></span>
            <span>Home</span>
            <span>Book</span>
            <span><button class="btn fw-bold btn-outline-light">Log in</button></span>
        </div>
    </nav>

    <div class="container py-5">
        <div class="book-container">
            <div class="row g-4 align-items-start">
                <div class="col-md-3 text-center">
                    @if ($book->image)
                        <img src="{{ asset($book->image) }}" class="book-image" alt="{{ $book->bookname }}">
                    @else
                        <img src="{{ asset('no-image.png') }}" class="book-image" alt="No image">
                    @endif
                </div>
                <div class="col-md-9 book-detail">
                    <h4 class="book-title">{{ $book->bookname }}</h4>
                    <p><strong>Author :</strong> {{ $book->author ?? 'N/A' }}</p>
                    <p><strong>Publications :</strong> {{ $book->reference ?? 'N/A' }}</p>
                    <p><strong>ISBN :</strong> {{ $book->reference ?? 'N/A' }}</p>
                    <p><strong>{{ $book->pages_count ?? '0' }} Pages</strong></p>


                </div>
            </div>

            <div class="mt-3 d-flex gap-3">
                <a href="{{ $book->pdf_link }}" target="_blank" class="btn btn-preview px-4">Preview</a>
                @if ($book->pdf_link)
                    <a href="{{ $book->pdf_link }}" target="_blank" class="btn btn-read px-4">Read</a>
                @endif
                <button class="btn btn-share px-4">Share</button>
            </div>

            <div class="mt-5">
                <h5 class="section-title">About Book</h5>
                <p>{{ $book->book_id ?? 'N/A' }}</p>


            </div>

            <div class="mt-4">
                <h5 class="section-title">More Info</h5>
                <table class="info-table">
                    <tr>
                        <td><strong>Language :</strong></td>
                        <td>{{ $book->language->language_name ?? 'English' }}</td>
                        <td><strong>Published In :</strong></td>
                        <td>India</td>
                    </tr>
                    <tr>
                        <td><strong>Publications :</strong></td>
                        <td>{{ $book->reference ?? 'N/A' }}</td>
                        <td><strong>Pages :</strong></td>
                        <td>{{ $book->pages_count ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Published Date :</strong></td>
                        <td>01-october-2025</td>
                    </tr>
                </table>
                <div class="">
                    <h5 class="section-title">Related Books</h5>
                    <div class="row g-4 mt-3">
                        @forelse ($relatedBooks as $related)
                            <div class="col-md-2 col-sm-4 col-6">
                                <div class="card bg-dark text-light h-100 text-center border-0 shadow-sm">
                                    @if ($related->image)
                                        <img src="{{ asset($related->image) }}" class="card-img-top"
                                            alt="{{ $related->bookname }}" style="height:150px; object-fit:cover;">
                                    @else
                                        <img src="{{ asset('no-image.png') }}" class="card-img-top" alt="No image"
                                            style="height:180px; object-fit:cover;">
                                    @endif
                                    <div class="card-body p-2">
                                        <h6 class="text-truncate">{{ $related->bookname }}</h6>
                                        <a href="{{ route('book.show', $related->id) }}"
                                            class="btn btn-sm btn-primary mt-2">View</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">No related books found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
