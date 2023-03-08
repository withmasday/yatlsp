@extends('layouts.app')

@section('content')
    <div id="particles-js"></div>
    <div class="container bg-white rounded-3 shadow-lg p-5 mt-3">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="text-primary pt-2">Daftar Brand Baru</h5>
            </div>
        </div>

        <form class="mt-4 row" method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mt-3 col-sm-12">
                <label for="name" class="text-secondary">{{ __('Brand Name') }}</label>
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

            <div class="col-sm-2 mt-5">
                <a href="{{ route('admin.brand.index') }}" class="btn btn-light w-100 shadow-lg py-2">Back</a>
            </div>

            <div class="col-sm-8 mt-5"></div>
            <div class="col-sm-2 mt-5">
                <button type="submit" class="btn btn-primaryc w-100 shadow-lg py-2">Create New
                    Brand</button>
            </div>
        </form>
    </div>
@endsection
