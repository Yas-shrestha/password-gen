<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">Shield Pass</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pass.show') }}">Passwords</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">Setting</a>
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> --}}
                </ul>
                <div class="d-flex">
                    @if (Auth::user())
                        <a href="{{ route('profile.edit') }}" class="btn btn-link text-decoration-none">Setting</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="btn  btn-primary text-white d-block py-2 px-3 text-decoration-none text-dark">
                                Log Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('register') }}" class="btn text-primary"><i class="fa-solid fa-moon"></i>
                            Sign-in</a>
                        <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('container')
    </main>
    <footer class="mt-0 text-center text-lg-start" style="background-color:#111827">
        <div class="container p-4">
            <div class="row">
                <!-- Product -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white">Product</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#" class="text-secondary text-decoration-none">Features</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Pricing</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Vault Access</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Mobile App</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white mb-0">Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-secondary text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Careers</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Press</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Contact</a></li>
                    </ul>
                </div>

                <!-- Resource -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white">Resource</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#" class="text-secondary text-decoration-none">Help Center</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Security Guide</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">API Docs</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Blog</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white mb-0">Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-secondary text-decoration-none">Privacy Policy</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Terms of Service</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">Cookies Policy</a></li>
                        <li><a href="#" class="text-secondary text-decoration-none">User Agreement</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2020 Copyright:
            <a class="text-secondary text-decoration-none" href="#">Shield Pass</a>
        </div>
    </footer>

    <script src="{{ asset('asset/js/min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
</body>

</html>
