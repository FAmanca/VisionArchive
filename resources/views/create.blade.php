@extends('layouts.main')
@section('container')
    <div class="bruform-container">
        @if ($data !== null)
            <h3 class="bruform-title">Edit Image</h3>
        @else
            <h3 class="bruform-title">Upload New Image</h3>
        @endif
        <div class="bruform-form-wrapper">
            @if ($data !== null)
                <form action="{{ route('image.update' , $data->id) }}" method="POST" class="bruform-form" enctype="multipart/form-data">
                    @method('PUT')
                @else
                    <form action="{{ route('image.store') }}" method="POST" class="bruform-form"
                        enctype="multipart/form-data">
            @endif
            @csrf

            <div class="bruform-input-group">
                <input type="text" class="bruform-input" placeholder="Image Title..." name="judul_foto"
                    value="{{ $data == null ? old('judul_foto') : $data->judul_foto }}" />
                @error('judul_foto')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="bruform-input-group">
                <textarea type="text" class="bruform-input" placeholder="Image Descriptions..." name="deskripsi_foto">{{ $data == null ? old('deskripsi_foto') : $data->deskripsi_foto }}</textarea>
                @error('deskripsi_foto')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="bruform-input-group">
                <select class="bruform-select" name="albumID">
                    <option selected {{ $data == null ? 'selected' : '' }} disabled>Select Albums</option>
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}"
                            {{ $data == null ? (old('albumID') == $album->id ? 'selected' : '') : ($album->id == $data->AlbumID ? 'selected' : '') }}>
                            {{ $album->nama_album }}</option>
                    @endforeach
                </select>
                @error('albumID')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
                <p class="mt-2 fst-italic">if you don't have an album, please create one first here -> <a href=""
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create Album</a></p>
            </div>

            <div class="bruform-input-group bruform-input-file-wrapper">
                <input type="file" id="fileInput" class="bruform-input-file" name="foto" />
                <label for="fileInput" class="bruform-file-label">
                    <span class="bruform-icon">+</span> Upload Files
                </label>
                @error('foto')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
                <div id="fileName" class="bruform-file-name mt-2">No file chosen :D</div>
            </div>

            <button type="submit" class="bruform-submit">{{ $data == null ? 'Create' : 'Update' }}</button>
            </form>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content brumodal">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Album</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('image.newalbum') }}" method="POST">
                            @csrf
                            <input type="text" class="bruform-input my-2" name="title" placeholder="Album title..." />
                            <textarea type="text" class="bruform-input my-2" name="description" placeholder="Album Descriptions..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="bruform-submit">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal --}}
    </div>


    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
            const fileName = document.getElementById('fileName');
            const file = this.files[0];
            if (file) {
                fileName.textContent = file.name; // Tampilkan nama file yang dipilih
            } else {
                fileName.textContent = 'No file chosen :D'; // Default jika tidak ada file
            }
        });
    </script>
@endsection
