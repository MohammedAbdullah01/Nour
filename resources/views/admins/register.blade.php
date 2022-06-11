@extends('admins.layouts.app')
@section('title', 'Admin | Register')

@section('content')

    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">{{'(: NO UR :)'}}</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Register to Your Account</h5>
                                    <p class="text-center small">Enter your Username & Email & Password to login</p>
                                </div>

                                <form class="row g-3 needs-validation" novalidate
                                    action="{{ route('admin.store.register') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="bi bi-envelope-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name"
                                        value="{{old('last_name')}}">

                                        @error('last_name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="bi bi-envelope-fill"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="first_name" class="form-control"placeholder="Enter First Name"
                                        value="{{old('first_name')}}">

                                            @error('first_name')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="bi bi-lock-fill"></i>
                                            </div>
                                        </div>
                                        <input type="email" name="email" class="form-control" placeholder="Enter E-email">

                                        @error('email')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="bi bi-lock-fill"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password">

                                        @error('password')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        {{-- <div class="col-8">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="remember">
                                                <label for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div> --}}
                                        <div class="col-4 d-grid gap-2 col-6 mx-auto">
                                            <button type="submit" class="btn btn-outline-primary btn-sm btn-block">
                                                {{ __('Sign Up') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
