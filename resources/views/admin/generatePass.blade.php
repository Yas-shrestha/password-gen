@extends('layouts.admin')
@section('container')
    <div class="container my-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center text-5xl fw-semibold">Generate your password</h1>

                        <h2 class="text-xl fw-semibold mb-4">Random Password Generator</h2>

                        <!-- Password Display -->
                        <div class="input-group mb-3">
                            <input id="genpassword" type="text" readonly class="form-control"
                                placeholder="Generated password">
                            <button onclick="copyPass()" class="btn btn-outline-primary">📋</button>
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
                            <label for="lengthSlider" class="form-label">Password Length: <span
                                    id="lengthValue">12</span></label>
                            <input id="lengthSlider" type="range" min="6" max="20" value="12"
                                class="form-range">
                        </div>

                        <!-- Generate Button -->
                        <div class="text-center mt-3">
                            <button class="btn btn-primary" onclick="genPass()">Generate Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("lengthSlider").addEventListener("input", function() {
            document.getElementById("lengthValue").innerText = this.value;
        });
    </script>
@endsection
