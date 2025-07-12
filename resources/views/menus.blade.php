@extends('layouts.main')

@section('container')

    @if ($menus->count())
        <section class="site-section" id="room">
            <section class="products" id="products">
                <center>
                    <h2>
                        <span>{{ $title }}</span>
                    </h2>
                    <p>{{ $description }}</p>
                </center>

                <div class="row mt-5">
                    <div class="col-xl-3 col-md-6 col-sm-3 mb-4">
                        <a href="/menus">
                            <div class="card {{ request('category') ? 'bg-secondary' : 'bg-primary' }} text-white">
                                <div class="card-body">
                                    <h5 class="custom-card-title">All Menu</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    @foreach ($categories as $category)
                        <div class="col-xl-3 col-md-6 col-sm-6 mb-4">
                            <a href="/menus?category={{ $category->slug }}">
                                <div
                                    class="card {{ request('category') == $category->slug ? 'bg-primary' : 'bg-secondary' }} text-white">
                                    <div class="card-body">
                                        <h5 class="custom-card-title">{{ $category->name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-2">
                    {{ $menus->links() }}
                </div>
                
                <div class="custom-row">
                    @foreach ($menus as $menu)
                        <div class="product-card">
                            <div class="product-icons">
                                <a href="#" class="item-detail-button" data-name="{{ $menu->name }}"
                                    data-price="IDR {{ number_format($menu->price) }}"
                                    data-image="{{ $menu->image && file_exists(public_path('storage/' . $menu->image)) ? asset('storage/' . $menu->image) : asset($menu->image) }}"
                                    data-desc="{{ $menu->description }}">
                                    <i data-feather="eye"></i>
                                </a>
                            </div>
                            <div class="product-image">
                                @if ($menu->image && file_exists(public_path('storage/' . $menu->image)))
                                    <img src="{{ asset('storage/' . $menu->image) }}" class="img-fluid" alt="menu Image">
                                @else
                                    <img src="{{ asset($menu->image) }}" alt="Default Image" class="img-fluid">
                                @endif
                            </div>
                            <div class="product-content">
                                <h3>{{ $menu->name }}</h3>
                                <div class="product-stars">
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                </div>
                                <div class="product-price">IDR {{ number_format($menu->price) ?? '30K' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Modal Box Item Detail start -->
                <div class="modal" id="item-detail-modal">
                    <div class="modal-container-custom">
                        <a href="#" class="close-icon"><i data-feather="x"></i></a>
                        <div class="modal-content-custom">
                            <img src="" id="modal-image" class="img-fluid" style="max-height:180px" alt="menus Image">
                            <div class="product-content">
                                <h3 id="modal-title"></h3>
                                <p id="modal-desc"></p>
                                <div class="product-stars">
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                    <i data-feather="star" class="star-full"></i>
                                </div>
                                <div class="product-price" id="modal-price"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Box Item Detail end -->

                <div class="d-flex justify-content-center my-4">
                    {{ $menus->links() }}
                </div>

            </section>
        </section>
    @else
        <p class="text-center fs-4">No Menu Found.</p>
    @endif

@endsection
