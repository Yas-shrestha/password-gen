@extends('layouts.frontend')

@section('container')
    <div class="container my-5">
        <section>
            <h1 class="text-center mb-4">FAQ's</h1>

            <div class="accordion" id="faqAccordion">

                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1Heading">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1"
                            aria-expanded="true" aria-controls="faq1">
                            What is Two-Factor Authentication (2FA)?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faq1Heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Two-Factor Authentication (2FA) is an extra layer of security for your online accounts. It
                            requires
                            not only your password but also a second factor, usually a temporary code sent to your mobile
                            device.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2Heading">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq2"
                            aria-expanded="false" aria-controls="faq2">
                            How can I change my password?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2Heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            To change your password, you need to log in to your account. After logging in, you can visit the
                            account settings page and change your password under the "Security" tab.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3Heading">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq3"
                            aria-expanded="false" aria-controls="faq3">
                            What should I do if I forget my password?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq3Heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            If you forget your password, you can reset it by clicking on the "Forgot Password" link on the
                            login
                            page. You'll receive a password reset link via email to regain access to your account.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq4Heading">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq4"
                            aria-expanded="false" aria-controls="faq4">
                            How can I protect my account from hacking?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faq4Heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Protect your account by using a strong password, enabling Two-Factor Authentication (2FA), and
                            never
                            sharing your login credentials. Regularly check your account activity for any suspicious
                            behavior.
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq5Heading">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq5"
                            aria-expanded="false" aria-controls="faq5">
                            How do I contact support?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" aria-labelledby="faq5Heading"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            You can contact support through our contact form, or email us directly at
                            support@yourwebsite.com.
                            Our team is available 24/7 to assist you with any questions or issues you may have.
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="p-5">
            @auth
                @if (Auth::user()->email === 'admin@gmail.com')
                    <h2 class="mb-4">All Contact Messages</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Submitted At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone ?? '-' }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>{{ $contact->created_at->format('d M, Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                    </div>
                @else
                    <div class="row">
                        <!-- First Column: Details like Email, Phone -->
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="card shadow border-0">
                                <div class="card-header text-center">
                                    <img src="{{ asset('asset/images/secure.jpg') }}" alt="Logo" class="img-fluid"
                                        style="max-height: 300px; width:100%; object-fit: cover;">
                                </div>
                                <div class="card-body">
                                    <p><strong style="font-size: 1.25rem;">Email:</strong> example@example.com</p>
                                    <p><strong style="font-size: 1.25rem;">Phone:</strong> +1 234 567 890</p>
                                    <p><strong style="font-size: 1.25rem;">Address:</strong> 123 Main St, City, Country</p>
                                    <!-- Add more details as necessary -->
                                </div>
                            </div>
                        </div>

                        <!-- Second Column: Form -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <form action="{{ route('contact.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="Your name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Your email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                placeholder="Your phone">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Message</label>
                                            <textarea class="form-control" name="message" id="message" rows="4" placeholder="Your message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                                {{-- Normal user (not admin) - show form --}}

                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="row">
                    <!-- First Column: Details like Email, Phone -->
                    <div class="col-lg-6 col-sm-12 mb-3">
                        <div class="card shadow border-0">
                            <div class="card-header text-center">
                                <img src="{{ asset('asset/images/secure.jpg') }}" alt="Logo" class="img-fluid"
                                    style="max-height: 300px; width:100%; object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <p><strong style="font-size: 1.25rem;">Email:</strong> example@example.com</p>
                                <p><strong style="font-size: 1.25rem;">Phone:</strong> +1 234 567 890</p>
                                <p><strong style="font-size: 1.25rem;">Address:</strong> 123 Main St, City, Country</p>
                                <!-- Add more details as necessary -->
                            </div>
                        </div>
                    </div>

                    <!-- Second Column: Form -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <form action="{{ route('contact.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Your name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Your email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Your phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" name="message" id="message" rows="4" placeholder="Your message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                            {{-- Normal user (not admin) - show form --}}

                        </div>
                    </div>
                </div>
            @endauth
        </section>
    </div>


    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ asset('asset/images/secure.jpg') }}" class="rounded me-2" alt="Logo" width="20"
                    height="20">
                <strong class="me-auto" id="toastTitle">Notification</strong>
                <small id="toastTime">Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastBody">
                Message goes here.
            </div>
        </div>
    </div>

    <!-- After bootstrap.bundle.min.js -->
    <script>
        function showToast(type, message, title = "Notification") {
            var toast = document.getElementById("liveToast");
            var toastBody = document.getElementById("toastBody");
            var toastTitle = document.getElementById("toastTitle");
            var toastTime = document.getElementById("toastTime");

            toastBody.textContent = message;
            toastTitle.textContent = title;
            toastTime.textContent = new Date().toLocaleTimeString();

            // Reset classes first
            toast.classList.remove('bg-success', 'bg-danger', 'bg-warning');

            // Apply background based on type
            if (type === 'success') {
                toast.classList.add('bg-success');
            } else if (type === 'error') {
                toast.classList.add('bg-danger');
            } else {
                toast.classList.add('bg-warning');
            }

            var bsToast = new bootstrap.Toast(toast);
            bsToast.show();
        }

        // Auto trigger if session has message
        @if (session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                showToast('success', "{{ session('success') }}", "Success");
            });
        @endif

        @if (session('error'))
            document.addEventListener('DOMContentLoaded', function() {
                showToast('error', "{{ session('error') }}", "Error");
            });
        @endif

        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                showToast('error', "Validation failed. Please check form.", "Validation Error");
            });
        @endif
    </script>
@endsection
