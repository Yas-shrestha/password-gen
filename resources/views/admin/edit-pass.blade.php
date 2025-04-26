@extends('layouts.admin')

@section('container')
    <div class="container mx-auto p-4">
        <div class="mb-4">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
        </div>

        <!-- Form for Adding a New Password -->
        <div class="card p-4 mb-4">
            <h2 class="text-2xl font-semibold mb-4">Add New Password</h2>
            <form action="{{ route('pass-manage.update', $pass->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="text" name="website" id="website" class="form-control" placeholder="Enter website URL"
                        value="{{ $pass->app_name }}" required />
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" value="{{ $pass->username }}" name="username" id="username" class="form-control"
                        placeholder="Enter username" required />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password"
                        required />
                </div>
                <div class="input-group mb-3">
                    <input id="genpassword" type="text" readonly class="form-control" placeholder="Generated password">
                </div>

                <!-- Customization Options -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="includeUppercase" checked>
                    <label class="form-check-label" for="includeUppercase">Include Uppercase</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="includeNumbers" checked>
                    <label class="form-check-label" for="includeNumbers">Include Numbers</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="includeSymbols" checked>
                    <label class="form-check-label" for="includeSymbols">Include Symbols</label>
                </div>

                <!-- Password Length Slider -->
                <div class="mt-3">
                    <label for="lengthSlider" class="form-label">Password Length: <span id="lengthValue">12</span></label>
                    <input id="lengthSlider" type="range" min="6" max="20" value="12" class="form-range">
                </div>

                <div class="text-center mt-3">
                    <button class="btn btn-primary" type="button" onclick="genPass()">Generate Password</button>
                </div>

                <button type="submit" class="btn btn-success">Save Password</button>
            </form>
        </div>

        <!-- Table for Displaying Passwords -->

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
