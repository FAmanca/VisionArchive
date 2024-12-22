@extends('layouts.main')
@section('container')
    <div class="neocontact-container">
        <div class="neocontact-form-container">
            <h2 class="neocontact-title">Contact Us</h2>
            <p class="neocontact-subtitle">We'd love to hear from you!</p>

            <form action="https://formspree.io/f/xjkkbzjw" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label neocontact-label">Name</label>
                    <input type="text" class="form-control bruform-input" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label neocontact-label">Email</label>
                    <input type="email" class="form-control bruform-input" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label neocontact-label">Message</label>
                    <textarea class="form-control bruform-input" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="neocontact-btn">Submit</button>
            </form>
        </div>
    </div>
@endsection
