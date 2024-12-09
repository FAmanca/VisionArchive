@extends('layouts.main')
@section('container')
    <div class="container mt-3">
        <div class="row align-items-start">
            <!-- Bagian Gambar -->
            <div class="col-lg-8 col-md-12 mt-3 mb-5">
                <img src="{{ asset('storage/' . $image->foto) }}" alt="Image Preview" class="img-fluid neo-image-details"
                    style="max-width: 100%; border: 2px solid #ccc; border-radius: 8px;">
                <!-- Tombol di bawah gambar -->
                <div class="d-flex gap-2 mt-2 justify-content-end">
                    <button class="btn btn-like"><i class="fa fa-heart"></i></button>
                    <a href="{{ route('image.download', $image->id) }}" class="btn btn-download"><i
                            class="fa fa-download"></i></a>
                    <button class="btn btn-share"><i class="fa fa-share"></i></button>
                </div>
                <div class="p-4">
                    <h2>{{ $image->judul_foto }}</h2>
                    <p>{{ $image->deskripsi_foto }}</p>
                </div>

                <!-- Bagian Komentar -->
                <div class="komentar">
                    <hr>
                    <h4>Comments</h4>
                    @if (Auth::check())
                        <!-- Komentar Form -->
                        <div class="d-flex align-items-start mb-3">
                            <!-- Gambar Profil -->
                            <img src="{{ Auth::user()->pfp != null ? asset('storage/' . Auth::user()->pfp) : asset('images/bg.png') }}" alt="Profile Picture" class="rounded-circle me-3"
                                style="width: 40px; height: 40px; object-fit: cover;">
                            <div class="w-100">
                                <!-- Input Komentar -->
                                <form action="{{ route('comment') }}" method="POST">
                                    @csrf
                                    <input class="neo-comments-form form-control mb-2" type="text"
                                        placeholder="Leave a Comment...." name="isi_komentar">
                                    <input type="hidden" name="id_foto" value="{{ $image->id }}">
                                    <!-- Tombol Kirim -->
                                    <button type="submit" class="neo-btn-comment w-100">Send</button>
                                </form>
                            </div>
                        </div>
                        {{-- FORM --}}
                        @else
                        <div class="d-flex align-items-start mb-3">
                            <div class="w-100 text-center">
                                <!-- Input Komentar -->
                                <h3 style="color: gray;"><i>Log in to start commenting</i></h3>
                            </div>
                        </div>
                    @endif

                    <!-- Komentar Lain -->
                    @foreach ($image->comments as $comment)
                        <div class="d-flex align-items-start mb-3">
                            <img src="{{$comment->user->pfp != null ? asset('storage/' . $comment->user->pfp) : asset('images/bg.png') }}" alt="Profile Picture" class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;">
                            <div>
                                <p class="mb-0"><strong>{{ $comment->user->username }}</strong></p>
                                <p>{{ $comment->isi_komentar }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Bagian User -->
            <div class="col-lg-4 col-md-12 mt-3 mb-5">
                <div class="p-3 d-flex flex-column align-items-center text-center neo-image-uploader">
                    <img src="{{ $image->user->pfp != null ? asset('storage/' . $image->user->pfp) : asset('images/bg.png') }}" alt="Profile Picture" class="rounded-circle mb-3"
                        style="width: 70px; height: 70px; object-fit: cover;">
                    <div>
                        <p class="mb-2">{{ $image->user->username }}</p>
                        <button class="btn btn-primary btn-sm w-100">Follow</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
