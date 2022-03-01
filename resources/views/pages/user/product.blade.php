@extends('layouts.home')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img"
                                    src="{{ isset($product->galleries[0]) == null? 'https://dummyimage.com/600x400/000/fff': Storage::url($product->galleries[0]->image) }}"
                                    alt="" />
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    @forelse ($product->galleries as $gallery)
                                        <div class="pt active" data-imgbigurl="{{ Storage::url($gallery->image) }}">
                                            <img src="{{ Storage::url($gallery->image) }}" alt="" />
                                        </div>
                                    @empty
                                        <div class="pt active" data-imgbigurl="https://dummyimage.com/600x400/000/fff">
                                            <img src="https://dummyimage.com/600x400/000/fff" alt="" />
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $product->type }}</span>
                                    <h3>{{ $product->nama }}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                    <h4>Rp.{{ $product->price }}</h4>
                                </div>
                                <div class="quantity">
                                    @auth
                                        <form action="{{ route('card.add', $product->id) }}" method="post">
                                            @csrf

                                            <div class="pro-qty">
                                                <input type="text" name="quantity" value="1" />
                                            </div>
                                            <button class="primary-btn pd-cart" type="submit">Add To Card</button>
                                        </form>
                                    @endauth
                                    @guest
                                        <a href="{{ route('login') }}" class="primary-btn pd-cart">Login</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="{{ isset($product->galleries[0]) == null? 'https://dummyimage.com/600x400/000/fff': Storage::url($product->galleries[0]->image) }}"
                                    alt="" />
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active">
                                        <a href="#"><i class="icon_bag_alt"></i></a>
                                    </li>
                                    <li class="quick-view"><a href="{{ route('product.show', $product->slug) }}">+
                                            Quick
                                            View</a></li>
                                    <li class="w-icon">
                                        <a href="#"><i class="fa fa-random"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{ $product->type }}</div>
                                <a href="#">
                                    <h5>{{ $product->nama }}</h5>
                                </a>
                                <div class="product-price">
                                    Rp.{{ $product->price }}

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
@endsection
