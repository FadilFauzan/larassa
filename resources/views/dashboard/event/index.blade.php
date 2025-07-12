@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid px-4">
        <center class="mb-2">
            <h1 class="mt-4 mb-0">LaraFest Event</h1>
        </center>

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
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr style="vertical-align: middle;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->description }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($event->date)->locale('id')->translatedFormat('l, d F Y') }}
                                </td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <div class="d-flex justify-content-center gap-1">
                                        <!-- Tombol Show -->
                                        <a href="/dashboard/events/{{ $event->slug }}" class="text-decoration-none">
                                            <button class="badge badge-gradient bg-primary" title="Show">
                                                <span class="fs-6"><i class="fas fa-eye"></i></span>
                                            </button>
                                        </a>

                                        <!-- Tombol Edit -->
                                        <a href="/dashboard/events/{{ $event->slug }}/edit" class="text-decoration-none">
                                            <button class="badge badge-gradient bg-warning" title="Edit">
                                                <span class="fs-6"><i class="fas fa-pencil"></i></span>
                                            </button>
                                        </a>

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
