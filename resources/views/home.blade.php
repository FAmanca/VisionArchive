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

        {{-- Galeri --}}
        <div class="row g-4 justify-content-center">
            @for ($i = 0; $i < 8; $i++)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="card">
                        <img src="{{ asset('images/footage/1.png') }}" class="card-img-top" alt="Image">
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
