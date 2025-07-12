@extends('dashboard.layouts.main')

@section('container')
    <section class="mt-4 container-fluid" style="max-width: 1000px">

        <a href="/dashboard/events" class="text-decoration-none">
            <button class="btn badge-gradient bg-info">
                <div class="text-white"><i class="fas fa-arrow-left rounded-circle"></i></div>
            </button>
        </a>

        <a href="/dashboard/events/{{ $event->slug }}/edit" class="text-decoration-none">
            <button class="btn badge-gradient bg-warning">
                <div class="text-white"><i class="fas fa-pencil me-2"></i>Edit</div>
            </button>
        </a>

        <div class="row mt-4">

            <!-- event Image -->
            <div class="col-lg-5 col-md-12 col-12 mb-4">
                @if ($event->image && file_exists(public_path('storage/' . $event->image)))
                    <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid img-fluid rounded shadow" alt="event Image">
                @else
                    <img src="{{ asset($event->image) }}" alt="Default Image" class="img-fluid">
                @endif
            </div>

            <!-- event Details -->
            <div class="col-lg-7 col-md-12 col-sm-12 px-5" style="background: white; border-radius: 10px">
                <h2 class="mb-3">{{ $event->title }}</h2>
                <p>{{ $event->description }}</p>
                <br>
                <div class="text-end">
                    <p>{{ \Carbon\Carbon::parse($event->date)->locale('id')->translatedFormat('l, d F Y') }}</p>
                </div>
                <hr>
            </div>
        </div>
    </section>
@endsection
