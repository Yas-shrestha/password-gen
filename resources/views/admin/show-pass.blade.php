@extends('layouts.admin')

@section('container')
    <div class="container my-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
    </div>

    <div class="container my-4">
        <div class="card p-4">
            <h2 class="text-2xl font-semibold mb-4">Passwords</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Website</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($passwords as $password)
                            <tr>
                                <td>{{ $password->app_name }}</td>
                                <td>{{ $password->username ?? 'N/A' }}</td>
                                <td>
                                    <span class="hidden-password">********</span>
                                    <span
                                        class="visible-password d-none">{{ Crypt::decryptString($password->password) }}</span>
                                    <button class="btn btn-sm btn-outline-primary toggle-password">👁</button>
                                    <button class="btn btn-sm btn-outline-success copy-password"
                                        data-password="{{ Crypt::decryptString($password->password) }}">📋</button>
                                </td>
                                <td>
                                    <a href="{{ route('pass-manage.edit', $password->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('pass-manage.share', $password->id) }}"
                                        class="btn btn-sm btn-info">Share</a>
                                    <form action="{{ route('pass-manage.destroy', $password->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container my-4 bg-white shadow">
        <h2 class="fs-3 fw-semibold   p-3">Passwords Shared With You</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Website</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Shared by</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receivedPasses as $password)
                        <tr>
                            <td>{{ $password->app_name }}</td>
                            <td>{{ $password->username ?? 'N/A' }}</td>
                            <td>
                                <span class="hidden-password">********</span>
                                <span
                                    class="visible-password d-none">{{ Crypt::decryptString($password->password) }}</span>
                                <button class="btn btn-sm btn-outline-primary toggle-password">👁</button>
                                <button class="btn btn-sm btn-outline-success copy-password"
                                    data-password="{{ Crypt::decryptString($password->password) }}">📋</button>
                            </td>
                            <td>{{ $password->user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                let row = this.closest('td');
                let hiddenPass = row.querySelector('.hidden-password');
                let visiblePass = row.querySelector('.visible-password');

                hiddenPass.classList.toggle('d-none');
                visiblePass.classList.toggle('d-none');
            });
        });
        document.querySelectorAll('.copy-password').forEach(button => {
            button.addEventListener('click', function() {
                let password = this.getAttribute('data-password');
                navigator.clipboard.writeText(password);
                alert("Password copied!");
            });
        });
    </script>
@endsection
