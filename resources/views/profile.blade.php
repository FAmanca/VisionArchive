@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="neoprofile-header d-flex justify-content-start my-3 position-relative">
            <div class="row w-100">
                <div class="neoprofile-profile col-2 me-3">
                    <img src="{{ Auth::user()->pfp != null ? asset('storage/' . Auth::user()->pfp) : asset('images/bg.png') }}"
                        alt="Profile Picture" class="neoprofile-img">
                </div>
                <div class="neoprofile-info col-6">
                    <h2 class="neoprofile-name">{{ Auth::user()->username }}</h2>
                    <p class="neoprofile-email">{{ Auth::user()->email }}</p>
                    <p class="neoprofile-created-at">Joined: {{ Auth::user()->created_at->format('M d, Y') }}</p>
                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="" class="neoprofile-edit">Edit
                        Profile</a>
                </div>
            </div>
            <form action="{{ route('auth.logout') }}" class="position-absolute top-0 end-0 mt-2 me-3" method="POST">
                @csrf
                <button type="submit" class="neoprofile-logout">Logout</button>
            </form>
        </div>



        <div class="neoprofile-image mt-4">
            <h3>Your Images</h3>
            <div class="image-container">
                @if ($images->isEmpty())
                    <p>No images uploaded yet.</p>
                @else
                    @foreach ($images as $image)
                        <div class="image-card position-relative">
                            <img src="{{ asset('storage/' . $image->foto) }}" class="img-thumbnail" alt="...">

                            <div class="action-buttons position-absolute top-0 end-0 p-2">
                                <a href="{{ route('image.edit', $image->id) }}" class="neobtn-edit me-1" title="Edit">
                                    <i style="color: black" class="fas fa-pen"></i>
                                </a>

                                <button class="neobtn-delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $image->id }}" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>

                            <!-- Modal Hapus -->
                            <div class="modal fade " id="deleteModal{{ $image->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $image->id }}" aria-hidden="true">
                                <div class="modal-dialog ">
                                    <div class="modal-content neomodal">
                                        <div class="modal-header neomodal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $image->id }}">Delete Image
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close" style=""></button>
                                        </div>
                                        <div class="modal-body neomodal-body">
                                            Are you sure you want to delete this image?
                                        </div>
                                        <div class="modal-footer neomodal-footer">
                                            <button type="button" class="neoprofile-logout mx-2" data-bs-dismiss="modal"
                                                style="color: white; background-color: gray">Cancel</button>
                                            <form action="{{ route('image.delete', $image->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="neoprofile-logout">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        </div>


        <div class="neoprofile-albums mt-4">
            <h3>Your Albums</h3>
            <table class="neoprofile-albums-table">
                <thead>
                    <th class="bg-violet">Album Title</th>
                    <th class="bg-yellow">Description</th>
                    <th class="bg-violet">Created at</th>
                    <th class="bg-yellow">Action</th>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                        <tr>
                            <td>{{ $album->nama_album }}</td>
                            <td>{{ $album->deskripsi }}</td>
                            <td>{{ $album->tanggal_buat }}</td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="neoprofile-settings mt-4">
            <h3>Settings</h3>
            <ul>
                <li><a data-bs-toggle="modal" data-bs-target="#changepass" href="" class="neoprofile-link">Change
                        Password</a></li>
                <li><a href="/delete-account" class="neoprofile-link">Delete Account</a></li>
            </ul>
        </div>
    </div>

    <!-- Modal Edit Profile -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content brumodal">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Your Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="">Username</label>
                        <input type="text" class="bruform-input my-2" placeholder="Username..."
                            value="{{ Auth::user()->username }}" name="username" />
                        <label class="my-2">Profile Pict</label>
                        <input type="file" class="bruform-input" style="background-color: #E6E6FA" name="pfp" />
                </div>
                <div class="modal-footer">
                    <button type="submit" class="bruform-submit">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal --}}

    <!-- Modal Change Profile -->
    <div class="modal fade" id="changepass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content brumodal brumodal-red">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="">Old Password</label>
                        <input type="text" class="bruform-input my-2" placeholder="Enter Old Password..."
                            name="oldpass" />
                        <label class="">New Password</label>
                        <input type="text" class="bruform-input my-2" placeholder="Enter New Password..."
                            name="newpass" />
                        <label class="">Confirm Password</label>
                        <input type="text" class="bruform-input my-2" placeholder="Confirm Password..."
                            name="newpass_confirmation" />
                </div>
                <div class="modal-footer">
                    <button type="submit" class="bruform-submit">Change Password</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal --}}
@endsection
