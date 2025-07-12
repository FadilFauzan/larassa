@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid px-4">
        <center class="mb-2">
            <h1 class="mt-4 mb-0">All menu</h1>
            <small class="text-secondary">
                All Larassa Cofee & Eat Menu
            </small>
        </center>

        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <a href="/dashboard/menus/create" class="text-decoration-none">
                    <button class="btn badge-gradient bg-info text-white" title="Show">
                        <span class="fs-6"><i class="fas fa-plus"></i> Add menu</span>
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
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Larassa Menu
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr style="vertical-align: middle;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->category->name }}</td>
                                <td>Rp{{ number_format($menu->price) }}</td>
                                <td>{{ $menu->description }}</td>
                                <td>{{ $menu->created_at }}</td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <div class="d-flex justify-content-center gap-1">
                                        <!-- Tombol Edit -->
                                        <a href="/dashboard/menus/{{ $menu->slug }}/edit" class="text-decoration-none">
                                            <button class="badge badge-gradient bg-warning" title="Edit">
                                                <span class="fs-6"><i class="fas fa-pencil"></i></span>
                                            </button>
                                        </a>

                                        <!-- Tombol Delete -->
                                        <form action="/dashboard/menus/{{ $menu->slug }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge badge-gradient bg-danger"
                                                onclick="return confirm('Are you sure?')" title="Delete">
                                                <span class="fs-6"><i class="fas fa-trash"></i></span>
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
            $("#success-alert, #error-alert").fadeOut(500);
        }, 5000); // 5000 milidetik (5 detik)
    </script>
@endsection
