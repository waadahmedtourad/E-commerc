@extends('dashboard.layouts.master')
@section('title', __('edit-dash.title', ['category' => $category->title]))
@section('main-content')

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-custom mb-4">
                
                <div class="card-header">
                    <strong class="card-title fs-2">{{ __('edit-dash.heading', ['category' => $category->title]) }}</strong>
                </div>
                
                <div class="card-body card-body-custom">
                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        
                        @include('dashboard.pages.category.form')
                        
                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-md px-4 font-weight-bold fs-5 btn-custom2">{{ __('edit-dash.update_button') }}</button>
                            <div>
                                <a href="{{ route('categories.index') }}" class="btn btn-md px-2 py-2 btn-custom2-reset">{{ __('edit-dash.return_button') }}</a>
                                <a href="{{ url()->previous() }}" class="btn btn-md px-2 py-2 btn-custom2-go">{{ __('edit-dash.back_button') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
