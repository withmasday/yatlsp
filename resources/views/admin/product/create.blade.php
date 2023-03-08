@extends('layouts.app')

@section('content')
    <div id="particles-js"></div>
    <div class="container bg-white rounded-3 shadow-lg p-5 mt-3">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-primary pt-2">Daftar Product Baru</h5>
            </div>
        </div>

        <form class="mt-4 row" method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mt-3 col-sm-12">
                <label for="name" class="text-secondary">{{ __('Product Name') }}</label>
                <div>
                    <input id="name" type="text"
                        class="ps-0 text-secondary border-0 rounded-0 shadow-none border-1 border-bottom form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mt-3 col-sm-4">
                <label for="price" class="text-secondary">{{ __('Product Price') }}</label>
                <div>
                    <input id="price" type="number"
                        class="ps-0 text-secondary border-0 rounded-0 shadow-none border-1 border-bottom form-control @error('price') is-invalid @enderror"
                        name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mt-3 col-sm-4">
                <label for="stock" class="text-secondary">{{ __('Product Stock') }}</label>
                <div>
                    <input id="stock" type="number"
                        class="ps-0 text-secondary border-0 rounded-0 shadow-none border-1 border-bottom form-control @error('stock') is-invalid @enderror"
                        name="stock" value="{{ old('stock') }}" required autocomplete="stock" autofocus>

                    @error('stock')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="mt-3 col-sm-2">
                <label for="avaiable" class="text-secondary d-block">{{ __('Product Avaiable') }}</label>
                <div class="d-inline-block me-2 mt-2">
                    <input id="avaiable" type="radio"
                        class="form-check-input me-2 @error('avaiable') is-invalid @enderror" name="avaiable" value="1"
                        required autocomplete="avaiable" checked>
                    <span class="text-secondary me-3">Yes</span>
                    <input id="avaiable" type="radio"
                        class="form-check-input me-2 @error('avaiable') is-invalid @enderror" name="avaiable" value="0"
                        required autocomplete="avaiable">
                    <span class="text-secondary">No</span>
                </div>
            </div>

            <div class="mt-3 col-sm-2">
                <label for="avaiable" class="text-secondary d-block">{{ __('Product Condition') }}</label>
                <div class="d-inline-block me-2 mt-2">
                    <input id="avaiable" type="radio"
                        class="form-check-input me-2 @error('avaiable') is-invalid @enderror" name="new" value="1"
                        required autocomplete="avaiable" checked>
                    <span class="text-secondary me-3">New</span>
                    <input id="avaiable" type="radio"
                        class="form-check-input me-2 @error('avaiable') is-invalid @enderror" name="new" value="0"
                        required autocomplete="avaiable">
                    <span class="text-secondary">Second</span>
                </div>
            </div>

            <div class="col-sm-12 mt-4">
                <label for="image" class="text-secondary d-block">{{ __('Product Image') }}</label>
                <input class="form-control mt-2" type="file" name="image[]" multiple>
            </div>

            <div class="col-sm-12 mt-4">
                <label for="description" class="text-secondary d-block">{{ __('Product Description') }}</label>
                <textarea
                    class="ps-0 text-secondary border-0 rounded-0 shadow-none border-1 border-bottom form-control @error('stock') is-invalid @enderror"
                    name="description" rows="6"></textarea>
            </div>

            <div class="col-sm-2 mt-5">
                <a href="{{ route('admin.product.index') }}" class="btn btn-light w-100 shadow-lg py-2">Back</a>
            </div>
            <div class="col-sm-8 mt-5"></div>
            <div class="col-sm-2 mt-5">
                <button type="submit" class="btn btn-primaryc w-100 shadow-lg py-2">Create New
                    Product</button>
            </div>
        </form>
    </div>
@endsection
