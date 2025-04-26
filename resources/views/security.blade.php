@extends('layouts.frontend')

@section('container')
    <div class="container my-5">
        <h1 class="text-center mb-4">Account Security</h1>



        <!-- Enable Two-Factor Authentication (2FA) -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Enable Two-Factor Authentication (2FA)</h5>
            </div>
            <div class="card-body">
                <p>Two-Factor Authentication adds an additional layer of security to your account. Once enabled, you’ll need
                    both your password and a verification code sent to your phone.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Log in to Enable 2FA</a>
            </div>
        </div>

        <!-- Monitor Account Activity Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Monitor Your Account Activity</h5>
            </div>
            <div class="card-body">
                <p>Regularly check your account activity to ensure that there is no suspicious behavior. If you notice
                    anything unusual, immediately change your password and contact support.</p>
                {{-- <a href="{{ route('activity.index') }}" class="btn btn-info">View Recent Activity</a> --}}
            </div>
        </div>

        <!-- Secure Your Devices Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Secure Your Devices</h5>
            </div>
            <div class="card-body">
                <p>Keep your devices secure by:</p>
                <ul>
                    <li>Enabling a screen lock.</li>
                    <li>Keeping your operating system and apps up to date.</li>
                    <li>Using antivirus software to protect against malware.</li>
                </ul>
            </div>
        </div>
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
    </div>
@endsection
