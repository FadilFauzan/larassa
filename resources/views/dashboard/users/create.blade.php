@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-4">

        <a href="/dashboard/users" class="text-decoration-none">
            <button class="btn badge-gradient bg-info">
                <div class="text-white"><i class="fas fa-arrow-left rounded-circle"></i></div>
            </button>
        </a>

        <div class="col-md-10 col-xl-8 col-lg-10">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Create New User Admin</h2>
            </div>
            <form action="/dashboard/users" method="post">
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="is_admin" value="1">
                </div>

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                        value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Username input -->
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"
                        class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                        value="{{ old('username') }}" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email input -->
                <div class="mb-3">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Email address"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn badge-gradient text-white bg-info mb-5">Create User</button>
                </div>
            </form>
        </div>
    </div>
@endsection
