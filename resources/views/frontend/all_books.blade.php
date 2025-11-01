@extends('layout.app')
@section('content')
    <style>
        nav {
            background-color: #1f4566;
            color: white;
            font-weight: bold;
        }

        /* category */

        .category-scroll {
            scroll-behavior: smooth;
            padding: 10px;
            scrollbar-width: none;
        }

        .category-scroll::-webkit-scrollbar {
            display: none;
        }

        .scroll-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: none;
            color: black;
            border: none;
            font-size: 24px;
            padding: 8px 12px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }



        .scroll-btn.left {
            left: 5px;
        }

        .scroll-btn.right {
            right: 5px;
        }

        .crdttl {
            font-size: 17px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            text-overflow: ellipsis;
            text-decoration: none;
        }
    </style>
    <section style="overflow: hidden;">

        <nav class="d-flex justify-content-between align-items-center px-5 py-3">
            <div>
                <img src="{{ asset('uploads/images/logo-removebg-preview.png') }}" width="50px" alt="">
            </div>

            <div class="d-flex gap-4 align-items-center">

                <span><i class="fa-solid fa-magnifying-glass"></i></span>
                <span>Home</span>
                <span>Books</span>
                <span><button class="btn fw-bold btn-outline-light">Log in</button></span>

            </div>
        </nav>


        {{-- books collection --}}

        <div class="row">
            <div class="col-3 mt-5">

                <h3 class=" ms-4 fw-bold border-bottom pb-3">Category</h3>
                @forelse ($categories as $category)
                    <div class="mx-2 py-2 text-center" style="min-width:200px; flex:0 0 auto;">
                        <div class="card-body">
                            <h5 class="card-title ms-3 border-bottom pb-3" style="text-align: start">
                                <a href="{{ route('books.index', ['category_id' => $category->id]) }}"
                                    class="text-decoration-none text-dark
                   {{ request('category_id') == $category->id ? 'fw-bold text-primary' : '' }}">
                                    {{ $category->name }}
                                </a>
                            </h5>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No categories found.</p>
                @endforelse

            </div>

            <div class="col-9">

                <div class="px-5 mt-4">


                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class=" mt-5 fw-bold">All Books</h2>

                            <hr style="width: 100%">
                        </div>

                        <div>

                            <form action="{{ route('books.index') }}" method="GET" class="mb-4">

                                <select name="language_id" class="form-select" onchange="this.form.submit()">
                                    <option value="">-- Select Language --</option>
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}"
                                            {{ request('language_id') == $language->id ? 'selected' : '' }}>
                                            {{ $language->language_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>


                        </div>
                    </div>


                    <div class="row g-4 mt-4">
                        @foreach ($books as $book)
                            <div class="col-md-3 col-sm-6">
                                <a href="{{ route('book.show', $book->id) }}">
                                    <div class="card h-100 shadow-sm border-0">
                                        @if ($book->image)
                                            <img src="{{ asset($book->image) }}" class="card-img-top"
                                                alt="{{ $book->name }}" style="width:100%;height:45vh;object-fit:cover;">
                                        @else
                                            <img src="{{ asset('no-image.png') }}" class="card-img-top" alt="No image"
                                                style="width:180px; object-fit:cover;">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title crdttl ">{{ $book->bookname }}</h5>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>

                </div>



            </div>
        </div>


        </div>


        <div class="mt-4 bg-light">
            {{ $books->links('pagination::bootstrap-5') }}
        </div>


    </section>
@endsection
