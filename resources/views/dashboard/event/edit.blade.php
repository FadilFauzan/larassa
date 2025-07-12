@extends('dashboard.layouts.main')

@section('container')

    <div class="container mt-4">
        <a href="/dashboard/events" class="text-decoration-none">
            <button class="btn badge-gradient bg-info">
                <div class="text-white"><i class="fas fa-arrow-left rounded-circle"></i></div>
            </button>
        </a>

        <div class="col-md-10 col-xl-8 col-lg-10">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Edit event</h2>
            </div>
            <form action="/dashboard/events/{{ $event->slug }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('name', $event->title) }}" autofocus required>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" value="{{ old('slug', $event->slug) }}" autofocus required>
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label d-block">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $event->image }}">

                    @if ($event->image && file_exists(public_path('storage/' . $event->image)))
                        <img src="{{ asset('storage/' . $event->image) }}"
                            class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                    @else
                        <img src="{{ asset($event->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
                    @endif

                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image" value="{{ old('image') }}" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        name="date" value="{{ old('date', $event->date) }}" required>
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <textarea class="form-control" name="description" id="description" rows="3" autofocus>{{ old('description', $event->description) }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn badge-gradient bg-info text-white mb-5" title="Edit">
                        <span class="fs-6">Edit Event</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
