@extends('layouts.main')

@section('container')
<div class="alert alert-warning text-center" style="top: 74px" role="alert">
    Hanya akun dengan hak akses <strong>Admin</strong> yang dapat login ke sistem ini.
</div>
    <section class="d-flex justify-content-center" style="margin-top: 50px">
        <div class="container w-100" style="max-width: 380px;">
            <div class="auth-form-login">
                <form action="/login" method="post">
                    @csrf

                    {{-- SweetAlert Notifications --}}
                    @if (session('success'))
                        <script>
                            Swal.fire({
                                title: 'Success!',
                                text: "{{ session('success') }}",
                                icon: 'success',
                                confirmButtonText: "Oke",
                            });
                        </script>
                    @endif

                    @if (session('status'))
                        <script>
                            Swal.fire({
                                title: 'Status!',
                                text: "{{ session('status') }}",
                                icon: 'success',
                                confirmButtonText: "Oke",
                            });
                        </script>
                    @endif

                    @if (session('loginError'))
                        <script>
                            Swal.fire({
                                title: 'Login Failed!',
                                text: "{{ session('loginError') }}",
                                icon: 'error',
                                confirmButtonText: "Oke",
                            });
                        </script>
                    @endif

                    <div class="d-flex justify-content-center mb-4">
                        <img src="/img/logo.png" alt="Logo" style="width: 150px">
                    </div>

                    <!-- Email input -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            placeholder="Enter your email" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password"
                            required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end mb-3">
                        <button type="submit" class="btn btn-primary text-light">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <script src="/js/googleLoginButton.js"></script>
@endsection
