@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid px-4">
        <center class="mb-2">
            <h1 class="mt-4 mb-0">All User</h1>
            <small class="text-secondary">
                All user admin in Larassa
            </small>
        </center>

        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <a href="/dashboard/users/create" class="text-decoration-none">
                    <button class="btn badge-gradient bg-info text-white" title="Show">
                        <span class="fs-6"><i class="fas fa-plus"></i> Add user admin</span>
                    </button>
                </a>
            </div>
        </div>

        @if (session()->has('success'))
            <div id="success-alert" class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div id="error-alert" class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="card mb-4 mt-4">
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Join at</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr style="vertical-align: middle;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                <td>{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <div class="d-flex justify-content-center gap-1">

                                        <form action="/dashboard/users/{{ $user->username }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger badge-gradient border-0"
                                                onclick="return confirm('Are you sure?')" title="Delete"
                                                style="{{ $user->username === 'admin' ? 'display: none' : '' }}">
                                                <i class="fs-6 fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        // Menggunakan jQuery untuk menyembunyikan pesan alert setelah 5 detik
        setTimeout(function() {
            $("#success-alert").fadeOut(500);
        }, 5000); // 5000 milidetik (5 detik)
    </script>
@endsection
