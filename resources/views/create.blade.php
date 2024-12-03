@extends('layouts.main')
@section('container')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <!-- Card untuk Form -->
                <div class="neobrutalism-card">
                    <div class="card-body">
                        <h2 class="neobrutalism-title mb-4">Add New Image</h2>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="form-label">Image Title</label>
                                <input type="text" class="form-control neobrutalism-input-field" id="title" name="title" placeholder="Enter image title" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control neobrutalism-input-field" id="description" name="description" rows="4" placeholder="Enter description" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" class="form-control neobrutalism-input-field" id="image" name="image" accept="image/*" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="neobrutalism-neobtn">Upload Image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
