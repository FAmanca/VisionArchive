@extends('layouts.main')

@section('container')
    <!-- Landing Page Section -->
    <section id="landing" class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 text-center text-md-start">
                <h1 class="display-4 fw-bolder">Welcome to Vision Archive</h1>
                <p class="lead mb-4">Explore a wide collection of high-quality images curated for your creative projects.</p>
                <a href="/home" class="btn btn-lg buttonneo">Start Exploring</a>
            </div>
            <div class="col-lg-6 col-md-12 text-center">
                <img src="{{ asset('images/footage/1.png') }}" alt="Landing Image" class="img-fluid landing-img">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="container my-5">
        <div class="row text-center g-5"> <!-- Gap set to g-5 for more spacing -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 cards">
                <div class="feature-box p-4">
                    <h3>High-Quality Images</h3>
                    <p>Our collection is curated from professional photographers worldwide.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 cards bg-blue">
                <div class="feature-box p-4">
                    <h3>Easy Search</h3>
                    <p>Find images effortlessly using our powerful search functionality.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 cards bg-green">
                <div class="feature-box p-4">
                    <h3>Free to Use</h3>
                    <p>All images are free to use for personal and commercial projects.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-dark text-white text-center py-4">
        <p style="color: white">&copy; 2024 Vision Archive. All rights reserved.</p>
    </footer>
@endsection
