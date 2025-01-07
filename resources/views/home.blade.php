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
            <h2>Result for {{ $search }}</h2>
            {{ $search == 'furina' ? 'Waifu nya developer tuh mang' : '' }}
            <div class="grid">
                @foreach ($keys as $key)
                    <div class="grid-item">
                        <a href="{{ route('image.show', $key->id) }}" class="card-link">
                            <div class="card">
                                <img src="{{ asset('storage/' . $key->foto) }}" class="card-img-top" alt="Image">
                                {{-- Card Buttons --}}
                                <div class="card-body text-center">
                                    @if (Auth::check())
                                        <a href="{{ route('image.like', $key->id) }}" class="btn btn-like">
                                            <i class="fa fa-heart"
                                                style="{{ $key->likes->pluck('UserId')->contains(auth()->user()->id) ? 'color: blue' : '' }}"></i>
                                        </a>
                                    @else
                                        <a data-bs-toggle="modal" data-bs-target="#like-{{ $key->id }}" class="btn btn-like">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    @endif

                                    <a href="{{ route('image.download', $key->id) }}" class="btn btn-download"><i
                                            class="fa fa-download"></i></a>
                                    <button data-bs-toggle="modal" data-bs-target="#share" class="btn btn-share"><i
                                            class="fa fa-share"></i></button>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- MODAL Like Belom Login CUY --}}
                    <div class="modal fade" id="like-{{ $key->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered"> <!-- Kelas modal-dialog-centered ditambahkan -->
                            <div class="modal-content brumodal">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="shareModalLabel">You Need To Login First</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Please log in to like this image.
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- MODAL SHARE CUY --}}
                    <div class="modal fade" id="share-{{ $key->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content brumodal">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="shareModalLabel">Share This Page</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Copy Link To Share</p>
                                    <input type="text" class="bruform-input my-2" id="copyLinkInput"
                                        value="{{ url('image/show/' . $key->id) }}" readonly />
                                    <button type="button" class="bruform-submit mt-2" onclick="copyToClipboard()">Salin
                                        Link</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            {{-- INI SEARCH QUERY --}}

            <h1 class="my-4">Explore Vision Collection</h1>

            {{-- INI New Arrivals Section --}}
            <h2 class="mb-4">New Arrivals</h2>
            <div class="grid">
                @foreach ($newimages as $newimage)
                    <div class="grid-item">
                        <a href="{{ route('image.show', $newimage->id) }}" class="card-link">
                            <div class="card">
                                <img src="{{ asset('storage/' . $newimage->foto) }}" class="card-img-top" alt="Image">
                                {{-- Card Buttons --}}
                                <div class="card-body text-center">
                                    @if (Auth::check())
                                        <a href="{{ route('image.like', $newimage->id) }}" class="btn btn-like"><i
                                                class="fa fa-heart"
                                                style="{{ Auth::check() && $newimage->likes->pluck('UserId')->contains(Auth::user()->id) ? 'color: blue' : '' }}"></i></a>
                                    @else
                                        <a data-bs-toggle="modal" data-bs-target="#like-{{ $newimage->id }}"
                                            class="btn btn-like">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('image.download', $newimage->id) }}" class="btn btn-download"><i
                                            class="fa fa-download"></i></a>
                                    <button data-bs-toggle="modal" data-bs-target="#share-{{ $newimage->id }}"
                                        class="btn btn-share"><i class="fa fa-share"></i></button>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- MODAL Like Belom Login CUY --}}
                    <div class="modal fade" id="like-{{ $newimage->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered"> <!-- Kelas modal-dialog-centered ditambahkan -->
                            <div class="modal-content brumodal">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="shareModalLabel">You Need To Login First</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Please log in to like this image.
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- MODAL SHARE CUY --}}
                    <div class="modal fade" id="share-{{ $newimage->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="shareModalLabel-{{ $newimage->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content brumodal">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="shareModalLabel-{{ $newimage->id }}">Share This Page
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Copy Link To Share</p>
                                    <input type="text" class="bruform-input my-2"
                                        id="copyLinkInput-{{ $newimage->id }}"
                                        value="{{ url('image/show/' . $newimage->id) }}" readonly />
                                    <button type="button" class="bruform-submit mt-2"
                                        onclick="copyToClipboard({{ $newimage->id }})">Salin
                                        Link</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif

    </div>


    <span class="loader"></span>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
