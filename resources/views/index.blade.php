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
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary-subtle">
        <div class="container">
            <a class="navbar-brand" href="#">Shield Pass</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Security</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Support</a>
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
                    <a href="{{ route('register') }}" class="btn text-primary"><i class="fa-solid fa-moon"></i>
                        Sign-in</a>
                    <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </div>
    </nav>
    <main style="background-color:#BBC6DF">
        <section class="main-section py-3">
            <div class="container">
                <div class="row p-5">
                    <div class="col-md-6  mb-3 col-sm-12">
                        <div class="text-center text-md-start py-5">
                            <h1 class="my-3" style="font-size:3.5rem">Keep Your Password Safe and Secure</h1>
                            <p class="mt-5 mb-3">Your Digital Life Secured with military-grade encryption.Access Your
                                Password anywhere
                                Anytime</p>
                        </div>
                        <div class="d-flex justify-content-center justify-content-md-start">
                            <a href="{{ route('register') }}" class="btn btn-primary me-3">Get Started</a>
                            <a href="#" class="btn text-light"><i class="fa-solid fa-play"></i> Watch Video</a>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12">
                        <div class="rounded-3">
                            <img src="{{ asset('asset/images/main-img.png') }}" alt="password manager" class="rounded-3"
                                style="width: 100%; height: 100%;background-color:#BBC6DF">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container p-5">
                <div class="my-4 text-center">
                    <h2>Why Choose Vault Service</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, minus.</p>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4  mb-3 col-sm-12">
                        <div class="card ">
                            <div class="pt-3 px-4">
                                <a href=""
                                    class="inline-block bg-primary-subtle px-3 py-2 text-primary rounded-3"><i
                                        class="fa-solid fa-moon"></i></a>

                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                b5
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  mb-3 col-sm-12">
                        <div class="card ">
                            <div class="pt-3 px-4">
                                <a href=""
                                    class="inline-block bg-primary-subtle px-3 py-2 text-primary rounded-3"><i
                                        class="fa-solid fa-moon"></i></a>

                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                b5
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  mb-3 col-sm-12">
                        <div class="card ">
                            <div class="pt-3 px-4">
                                <a href=""
                                    class="inline-block bg-primary-subtle px-3 py-2 text-primary rounded-3"><i
                                        class="fa-solid fa-moon"></i></a>

                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                b5
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="p-5" style="background-color:#233254">
                <div class="text-center text-white">
                    <h3>Ready to Secure your Digital Life</h3>
                    <p class="my-5">Join thousand of user who trust SecureVault with their passwords</p>
                    <a href="" class="btn btn-light mb-3">Get Started Now</a>
                </div>
            </div>
        </section>
    </main>
    <footer class=" mt-0 text-center text-lg-start" style="background-color:#111827">
        <div class="container p-4">
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white">Product</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white mb-0">Company</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white">Resource</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white mb-0">Legal</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-secondary  text-decoration-none ">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2020 Copyright:
            <a class="text-secondary  text-decoration-none " href="">Shield Pass</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
</body>

</html>
