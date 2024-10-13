@extends('website.layouts.master')

@section('title', 'Shop-single Page')  

@section('main-content') 

<div class="site-wrap">

    <div class="bg-light py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0">
              <a href="{{ route('home') }}">Home</a> <!-- Fixed route to point to home -->
              <span class="mx-2 mb-0">/</span>
              <strong class="text-black">{{ $product->title ?? 'Product Title' }}</strong> <!-- Added fallback text -->
          </div>
          </div>
        </div>
    </div>  

    <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img src="{{ asset('storage/' . $product->image) }}" alt="Image" class="img-fluid" style="height: 490px ; width : 450px">
            </div>
            <div class="col-md-6">
              <h2 class="text-black">{{ $product->title }}</h2>
              <p>{{ $product->description }}</p>
              <p class="mb-4">{{ __('singleShop.additional_info') }}</p>
              <p><strong class="text-primary h4">{{ $product->price }}$</strong></p>
              <p class="text-secondary">{{ $product->available_quantity }} available</p>
              <div class="mb-1 d-flex">
                <label for="option-sm" class="d-flex mr-3 mb-3">
                  <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">{{ __('singleShop.small') }}</span>
                </label>
                <label for="option-md" class="d-flex mr-3 mb-3">
                  <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">{{ __('singleShop.medium') }}</span>
                </label>
                <label for="option-lg" class="d-flex mr-3 mb-3">
                  <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">{{ __('singleShop.large') }}</span>
                </label>
                <label for="option-xl" class="d-flex mr-3 mb-3">
                  <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black">{{ __('singleShop.extra_large') }}</span>
                </label>
              </div>
              <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 120px;">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                  </div>
                  <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                  </div>
                </div>
              </div>
              <p><a href="cart.html" class="buy-now btn btn-sm btn-primary">{{ __('singleShop.add_to_cart') }}</a></p>
            </div>
          </div>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
              <h2>{{ __('singleShop.featured_products') }}</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="nonloop-block-3 owl-carousel">
                @forelse($products as $product) <!-- Corrected line -->
                    <div class="item">
                        <div class="block-4 text-center">
                          <figure class="block-4-image">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Image placeholder" class="img-fluid" style="width: 450px; height: 450px; object-fit: cover;">
                          </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="{{ route('shopsingle', $product->id) }}">{{ $product->title }}</a></h3>
                                <p class="card-text">{{ Str::limit($product->description ?? 'No description available', 50, '...') }}</p>
                                <p class="text-primary font-weight-bold">{{ $product->price }}$</p>
                                <p class="text-secondary">{{ $product->available_quantity }} available</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 mt-5">
                        <div class="alert alert-warning text-center" role="alert">
                            No Featured Products available to display at the moment.
                        </div>
                    </div>
                @endforelse
            </div>
            </div>
          </div>
        </div>
    </div>

</div>

@endsection
