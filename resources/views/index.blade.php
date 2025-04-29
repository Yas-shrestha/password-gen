@extends('layouts.frontend')

@section('container')
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
                    <p>Vault Service ensures your digital data is secure, accessible, and private with top-tier
                        protection.</p>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4 mb-3 col-sm-12">
                        <div class="card">
                            <div class="pt-3 px-4">
                                <a href="" class="inline-block bg-primary-subtle px-3 py-2 text-primary rounded-3">
                                    <i class="fa-solid fa-lock"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">End-to-End Encryption</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Maximum Data Security</h6>
                                <p class="card-text">All your files are encrypted from the moment you upload them until
                                    they're accessed, ensuring privacy and confidentiality.</p>
                                b5
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 col-sm-12">
                        <div class="card">
                            <div class="pt-3 px-4">
                                <a href="" class="inline-block bg-primary-subtle px-3 py-2 text-primary rounded-3">
                                    <i class="fa-solid fa-clock"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">24/7 Access</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Your Data Anytime</h6>
                                <p class="card-text">Access your files anytime from anywhere. Our cloud-based service
                                    never sleeps, just like your data shouldn't.</p>
                                b5
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 col-sm-12">
                        <div class="card">
                            <div class="pt-3 px-4">
                                <a href="" class="inline-block bg-primary-subtle px-3 py-2 text-primary rounded-3">
                                    <i class="fa-solid fa-plug"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Easy Integration</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Works With Your Tools</h6>
                                <p class="card-text">Seamlessly integrate Vault Service with your existing workflow
                                    tools like Google Drive, Dropbox, or OneDrive.</p>
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
@endsection
