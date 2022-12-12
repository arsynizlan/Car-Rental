@extends('layouts.master')

@section('title')
    Login - Nikel Corp
@endsection

@section('login')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <h3>NIKEL CORP</h3>
                        <p class="mb-2">Silahkan masuk ke akun Anda!</p>

                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus required />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Ingat saya </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>

                        {{-- <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="auth-register-basic.html">
                                <span>Create an account</span>
                            </a>
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
