@extends('layouts.admin')
@section('container')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <h2 class="mb-4 text-center fw-semibold">Profile</h2>

                {{-- Update Profile Info --}}
                <div class="card mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                {{-- Update Password --}}
                <div class="card mb-4">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                {{-- Delete Account --}}
                <div class="card mb-4">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
