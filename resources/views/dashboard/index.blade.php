@extends('dashboard.layouts.main')

@section('container')
    @if (session('login'))
        <div class="alert alert-success alert-dismissible fade show mt-4" id="success-alert" role="alert">
            {{ session('login') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" id="success-alert" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $greeting }}, {{ ucwords(auth()->user()->name) }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Informasi User -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Role:</strong> {{ auth()->user()->is_admin ? 'Admin' : 'User' }}</p>

                <button class="btn badge-gradient bg-warning mt-3" data-bs-toggle="modal" data-bs-target="#formModal">
                    <i class="fas fa-key me-2"></i>Change Password
                </button>
            </div>
        </div>

        <div class="row">
            <!-- Card for Members -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card custom-card-gradient bg-primary text-white">
                    <div class="card-body">
                        <h5 class="custom-card-title">User Admin</h5>
                        <div class="custom-card-number"><i class="fas fa-users fs-2"></i> {{ $totalUsers }}</div>
                    </div>
                    <div class="card-footer custom-card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/dashboard/users">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Card for Rooms -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card custom-card-gradient bg-success text-white">
                    <div class="card-body">
                        <h5 class="custom-card-title">Menus</h5>
                        <div class="custom-card-number"><i class="fas fa-shopping-bag fs-2"></i> {{ $totalMenus }}</div>
                    </div>
                    <div class="card-footer custom-card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/dashboard/menus">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

            <!-- Card for Room Categories -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card custom-card-gradient bg-danger text-white">
                    <div class="card-body">
                        <h5 class="custom-card-title">Menu Categories</h5>
                        <div class="custom-card-number"><i class="fas fa-layer-group fs-2"></i> {{ $totalCategories }}
                        </div>
                    </div>
                    <div class="card-footer custom-card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/dashboard/categories">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
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
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Created at</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr style="vertical-align: middle;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->category->name }}</td>
                                <td>Rp{{ number_format($menu->price) }}</td>
                                <td>{{ $menu->description }}</td>
                                <td>{{ $menu->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('auth.change-password')

    <script>
        // Menggunakan jQuery untuk menyembunyikan pesan alert setelah 5 detik
        setTimeout(function() {
            $("#success-alert").fadeOut(500);
        }, 5000); // 5000 milidetik (5 detik)
    </script>
@endsection
