@extends('layouts.main')
@section('container')
    <div class="container my-5">
        {{-- Search Bar --}}
        <div class="row justify-content-center">
            <form action="" class="w-75">
                <div class="input-group mb-4">
                    <input class="form-control search-bar p-3" type="text" placeholder="Search Vision Archive...">
                </div>
            </form>
        </div>

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
        <div class="row g-4 justify-content-center">
            @foreach ($newimages as $newimage)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <a href="#" class="card-link">
                        <div class="card">
                        
                            <img src="{{ asset('storage/' . $newimage->foto) }}" class="card-img-top" alt="Image">

                            {{-- Card Buttons --}}
                            <div class="card-body text-center">
                                <button class="btn btn-like"><i class="fa fa-heart"></i></button>
                                <button class="btn btn-download"><i class="fa fa-download"></i></button>
                                <button class="btn btn-share"><i class="fa fa-share-alt"></i></button>
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

    </div>
@endsection
