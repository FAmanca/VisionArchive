@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="neoprofile-header d-flex justify-content-start my-3 position-relative">
            <div class="row w-100">
                <div class="neoprofile-profile col-2 me-3">
                    <img src="{{ asset('images/bg.png') }}" alt="Profile Picture" class="neoprofile-img">
                </div>
                <div class="neoprofile-info col-8">
                    <h2 class="neoprofile-name text-center">Edit Profile</h2>
                    <h2 class="neoprofile-name">{{ Auth::user()->username }}</h2>
                    <p class="neoprofile-email">{{ Auth::user()->email }}</p>
                    <p class="neoprofile-created-at">Joined: {{ Auth::user()->created_at->format('M d, Y') }}</p>

                    <div class="bruform-input-group">
                        <input type="text" class="bruform-input" placeholder="Username..." name="judul_foto"/>
                        @error('judul_foto')
                            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="neoprofile-settings mt-4">
            <h3>Settings</h3>
            <ul>
                <li><a href="/change-password" class="neoprofile-link">Change Password</a></li>
                <li><a href="/delete-account" class="neoprofile-link">Delete Account</a></li>
            </ul>
        </div>
    </div>
@endsection
