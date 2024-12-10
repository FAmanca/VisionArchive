@extends('layouts.main')
@section('container')
    <div class="container my-5">
        {{-- Search Bar --}}
        <div class="row justify-content-center">
            <form action="{{ route('home.search') }}" class="w-75">
                <div class="input-group mb-4">
                    <input name="key" class="form-control search-bar p-3" type="text"
                        placeholder="Search Vision Archive...">
                </div>
            </form>
        </div>

        {{-- SEARCH RESULT QUERY --}}
        @if ($keys != null)
            <h2>search for {{ $search }}</h2>
            <div class="grid">
                @foreach ($keys as $key)
                    <div class="grid-item">
                        <a href="{{ route('image.show', $key->id) }}" class="card-link">
                            <div class="card">
                                <img src="{{ asset('storage/' . $key->foto) }}" class="card-img-top" alt="Image">
                                {{-- Card Buttons --}}
                                <div class="card-body text-center">
                                    <button class="btn btn-like"><i class="fa fa-heart"></i></button>
                                    <a href="{{ route('image.download', $key->id) }}" class="btn btn-download"><i
                                            class="fa fa-download"></i></a>
                                    <button class="btn btn-share"><i class="fa fa-share"></i></button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            {{-- SEARCH QUERY --}}

            <h1 class="my-4">Explore Vision Collection</h1>

            {{-- Filter Section for New Arrivals --}}
            <div class="row justify-content-between mb-4">
                <div class="col-auto">
                    <button class="btn btn-dark">Sort by Date</button>
                    <button class="btn btn-dark">Sort by Popularity</button>
                </div>
                <div class="col-auto">
                    <select class="form-select">
                        <option selected>Filter by Category</option>
                        <option value="1">Nature</option>
                        <option value="2">Technology</option>
                        <option value="3">People</option>
                    </select>
                </div>
            </div>

            {{-- New Arrivals Section --}}
            <h2 class="mb-4">New Arrivals</h2>
                <div class="grid">
                    @foreach ($newimages as $newimage)
                        <div class="grid-item">
                            <a href="{{ route('image.show', $newimage->id) }}" class="card-link">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $newimage->foto) }}" class="card-img-top"
                                        alt="Image">
                                    {{-- Card Buttons --}}
                                    <div class="card-body text-center">
                                        <button class="btn btn-like"><i class="fa fa-heart"></i></button>
                                        <a href="{{ route('image.download', $newimage->id) }}" class="btn btn-download"><i
                                                class="fa fa-download"></i></a>
                                        <button class="btn btn-share"><i class="fa fa-share"></i></button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>


            {{-- Pagination (Dummy) --}}
            <div class="row justify-content-center mt-5">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        @endif

    </div>
    <span class="loader"></span>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var content = document.querySelector('.container');
            var load = document.querySelector('.loader');
            content.style.display = 'none';

            var grid = document.querySelector('.grid');
            var images = grid.querySelectorAll('img');
            var imagesLoaded = 0;
            var totalImages = images.length;

            // Fungsi untuk mengecek jika semua gambar telah dimuat
            function onImageLoad() {
                imagesLoaded++;
                if (imagesLoaded === totalImages) {
                    // Semua gambar sudah dimuat, jalankan kode berikutnya
                    content.style.display = 'block';
                    load.style.display = 'none';

                    // Inisialisasi Masonry
                    var msnry = new Masonry(grid, {
                        itemSelector: '.grid-item',
                        columnWidth: '.grid-item',
                        percentPosition: true
                    });
                }
            }

            // Menambahkan event listener untuk setiap gambar
            images.forEach(function(image) {
                image.addEventListener('load', onImageLoad);

                // Jika gambar sudah ada di cache, langsung hitung sebagai dimuat
                if (image.complete) {
                    onImageLoad();
                }
            });

            // Jika tidak ada gambar, langsung jalankan
            if (totalImages === 0) {
                onImageLoad();
            }
        });
    </script>
@endsection
