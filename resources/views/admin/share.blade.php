@extends('layouts.admin')
@section('container')
    <div class="container py-5">
        <h2 class="fw-semibold text-primary mb-4">
            Share Password: {{ $password->website }}
        </h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Current Access List -->
                <h3 class="fw-semibold text-dark mb-3">Users with Access</h3>
                @if ($sharedWith->isEmpty())
                    <p class="text-muted">No one has access to this password yet.</p>
                @else
                    <ul class="list-group mb-4">
                        @foreach ($sharedWith as $share)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $share->sharedWith->email }} ({{ $share->sharedWith->name }})</span>
                                <form action="{{ route('pass-manage.remove-share', [$password->id, $share->id]) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to remove access for this user?')">
                                        Remove
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!-- Share Form -->
                <h3 class="fw-semibold text-dark mb-3">Share with Someone New</h3>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('pass-manage.store-share', $password->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="shared_with_user_id" class="form-label">Share with</label>
                        <select name="shared_with_user_id" id="shared_with_user_id" class="form-select">
                            @foreach ($users as $id => $email)
                                <option value="{{ $id }}">{{ $email }}</option>
                            @endforeach
                        </select>
                        @error('shared_with_user_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Share</button>
                </form>
            </div>
        </div>
    </div>
@endsection
