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
    <section>

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

        {{-- carousel --}}

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('uploads/images/banner3.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('uploads/images/banner4.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

        {{-- book categories --}}

        <h3 class="mb-4 mt-5 fw-bold text-center">Book Categories</h3>

        <div class="position-relative">
            <!-- Left Nav -->
            <button class="scroll-btn left" id="scrollLeft">
                &#10094;
            </button>

            <!-- Scrollable Category Row -->
            <div class="category-scroll d-flex overflow-auto" id="categoryScroll">
                @forelse ($categories as $category)
                    <div class=" mx-2 text-center" style="min-width:200px; flex:0 0 auto;">
                        @if ($category->image)
                            <img src="{{ asset($category->image) }}" class="card-img-top" alt="{{ $category->name }}"
                                style="width:130px; object-fit:cover;">
                        @else
                            <img src="{{ asset('no-image.png') }}" class="card-img-top" alt="No image"
                                style="width:180px; object-fit:cover;">
                        @endif

                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $category->name }}</h5>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No categories found.</p>
                @endforelse
            </div>

            <!-- Right Nav -->
            <button class="scroll-btn right" id="scrollRight">
                &#10095;
            </button>
        </div>


        {{-- books collection --}}

        <div class="px-5 mt-4">

            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h2 class=" mt-5 fw-bold">Books</h2>

                    <hr style="width: 100%">
                </div>

                <div>

                    <a href="{{ route('allbooks') }}" class="btn">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>


            <div class="row g-4 mt-4">
                @foreach ($books as $book)
                    <div class="col-md-2 col-sm-6">
                        <a href="{{ route('book.show', $book->id) }}">
                            <div class="card h-100 shadow-sm border-0">
                                @if ($book->image)
                                    <img src="{{ asset($book->image) }}" class="card-img-top" alt="{{ $book->name }}"
                                        style="width:100%; height:45vh; object-fit:cover;">
                                @else
                                    <img src="{{ asset('no-image.png') }}" class="card-img-top" alt="No image"
                                        style="width:180px; object-fit:cover;">
                                @endif
                                <div class="card-body">
                                    <p class="card-title crdttl fw-bold ">{{ $book->bookname }}</p>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        </div>



    </section>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const scrollContainer = document.getElementById("categoryScroll");
        const leftBtn = document.getElementById("scrollLeft");
        const rightBtn = document.getElementById("scrollRight");
        const cardWidth = 200; // card width + margin

        // Manual scroll buttons
        leftBtn.addEventListener("click", () => {
            scrollContainer.scrollBy({
                left: -cardWidth,
                behavior: "smooth"
            });
        });
        rightBtn.addEventListener("click", () => {
            scrollContainer.scrollBy({
                left: cardWidth,
                behavior: "smooth"
            });
        });

        // Auto scroll one by one
        let autoScroll = setInterval(() => {
            if (
                scrollContainer.scrollLeft + scrollContainer.clientWidth >=
                scrollContainer.scrollWidth - 5
            ) {
                // if reached end, go back to start
                scrollContainer.scrollTo({
                    left: 0,
                    behavior: "smooth"
                });
            } else {
                scrollContainer.scrollBy({
                    left: cardWidth,
                    behavior: "smooth"
                });
            }
        }, 2000); // scroll every 2 seconds

        // Pause on hover
        scrollContainer.addEventListener("mouseenter", () => clearInterval(autoScroll));
        scrollContainer.addEventListener("mouseleave", () => {
            autoScroll = setInterval(() => {
                if (
                    scrollContainer.scrollLeft + scrollContainer.clientWidth >=
                    scrollContainer.scrollWidth - 5
                ) {
                    scrollContainer.scrollTo({
                        left: 0,
                        behavior: "smooth"
                    });
                } else {
                    scrollContainer.scrollBy({
                        left: cardWidth,
                        behavior: "smooth"
                    });
                }
            }, 2000);
        });
    });
</script>
