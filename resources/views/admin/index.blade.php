@extends('layouts.admin')
@section('container')
    <main>
        <section>
            <div class="container pt-5">
                <div class="row pt-4 text-center">
                    <div class="col-md-4 col-sm-12">
                        <a href="{{ route('pass-manage.index') }}" class="btn btn-primary text-white px-4">Add A New
                            Password</a>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <a href="{{ route('pass.gen') }}" class="btn btn-success text-white px-4">Generate A Strong
                            Password</a>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <a href="{{ route('pass.show') }}" class="btn text-white  px-4" style="background-color:purple">View
                            Password and
                            Shared Password</a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container p-5">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Passwords</h5>
                                <h6 class="card-subtitle mb-2 text-muted ">{{ $totalPassword }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Shared Passwords</h5>
                                <h6 class="card-subtitle mb-2 text-muted ">{{ $totalSharedPassword }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Reused Passwords</h5>
                                <h6 class="card-subtitle mb-2 text-muted ">{{ $totalReusedPasswords }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section>
            <div class="container px-5">
                <h1>Categories</h1>
                <div class="row my-4">
                    <div class="col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Website</h5>
                                <h6 class="card-subtitle mb-2 text-muted ">Total No of Passwords:
                                    {{ $totalPassword + $totalSharedPassword }} </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container px-5">
                @if ($recentPasswords->isNotEmpty())
                    <h3 class="font-semibold text-lg mb-4">Recently Added Passwords</h3>
                    <div class="row">
                        @foreach ($recentPasswords as $pass)
                            <div class="col-md-4 col-sm-12 mb-4">
                                <div class="card shadow-lg rounded-lg p-4 border border-gray-200">
                                    <!-- Card Header -->
                                    <div class="card-body">
                                        <h5 class="card-title text-lg font-semibold text-gray-800">{{ $pass->app_name }}
                                        </h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $pass->updated_at->diffForHumans() }}
                                        </h6>
                                    </div>

                                    <!-- Password Display -->
                                    <div class="card-body flex items-center border border-gray-300 rounded-lg p-2 mb-4">
                                        <input type="password" value="{{ Crypt::decryptString($pass->password) }}"
                                            class="w-full outline-none text-lg px-2 bg-transparent password-field"
                                            readonly />
                                        <button onclick="togglePassword(this)"
                                            class="ml-2 text-blue-500 hover:text-blue-700">
                                            👁
                                        </button>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="card-body flex justify-between">
                                        <a href="{{ route('pass-manage.edit', $pass->id) }}"
                                            class="btn btn-sm btn-warning text-white w-1/2 mr-2">
                                            ✏️ Edit
                                        </a>
                                        <a href="{{ route('pass-manage.share', $pass->id) }}"
                                            class="btn btn-sm btn-info text-white w-1/2">
                                            🔗 Share
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">No recently added passwords.</p>
                @endif
            </div>
        </section>
        <section class="my-5">
            <div class="container">
                <h1 class="mb-4 text-center">Recent Activities</h1>

                <ul class="list-group">
                    @foreach ($activities as $activity)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <!-- Activity User and Action -->
                            <div>
                                <strong>{{ $activity->user->name }}</strong>
                                <span class="badge bg-info text-dark p-2">{{ ucfirst($activity->action) }}</span>
                                <small class="text-muted">({{ $activity->created_at->diffForHumans() }})</small>
                            </div>

                            <!-- Description and Action Color -->
                            <div>
                                <!-- Color-coding based on action -->
                                @if ($activity->action == 'password_shared')
                                    <span class="badge bg-success text-white">Shared</span>
                                @elseif($activity->action == 'share_removed')
                                    <span class="badge bg-danger text-white">Removed</span>
                                @else
                                    <span class="badge bg-primary text-white">Saved</span>
                                @endif
                            </div>

                            <!-- Description under the action -->
                            <small class="text-muted mt-2 d-block">{{ $activity->description }}</small>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

    </main>
    <script>
        function togglePassword(button) {
            let input = button.previousElementSibling;
            if (input.type === "password") {
                input.type = "text";
                button.innerText = "🔒"; // Change icon
            } else {
                input.type = "password";
                button.innerText = "👁"; // Change icon
            }
        }
    </script>
@endsection
