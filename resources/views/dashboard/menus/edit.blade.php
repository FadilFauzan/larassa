@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-4">

        <a href="/dashboard/menus" class="text-decoration-none">
            <button class="btn badge-gradient bg-info">
                <div class="text-white"><i class="fas fa-arrow-left rounded-circle"></i></div>
            </button>
        </a>

        <div class="col-md-10 col-xl-8 col-lg-10">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2>Edit menu</h2>
            </div>
            <form action="/dashboard/menus/{{ $menu->slug }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $menu->name) }}" autofocus required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" value="{{ old('slug', $menu->slug) }}" autofocus required>
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id" autofocus>
                        <option value="" selected disabled>Choose Category</option>
                        @foreach ($categories as $category)
                            @if (old('category_id', $menu->category_id) == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label d-block">Image</label>
                    <input type="hidden" name="oldImage" value="{{ $menu->image }}">

                    @if ($menu->image && file_exists(public_path('storage/' . $menu->image)))
                        <img src="{{ asset('storage/' . $menu->image) }}"
                            class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                    @else
                        <img src="{{ asset($menu->image) }}" class="img-preview img-fluid mb-3 col-sm-5">
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
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('price', $menu->price) }}" required>
                    @error('price')
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

                    <textarea class="form-control" name="description" id="description" rows="3" autofocus>{{ old('description', $menu->description) }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn badge-gradient bg-info text-white mb-5" title="Edit">
                        <span class="fs-6">Edit menu</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
