@extends('layouts.app')

@section('content')
    <div id="particles-js"></div>
    <div class="container bg-white rounded-3 shadow-lg p-3">
        <div class="row">
            <div class="col-sm-3">
                <h5 class="text-primary pt-2">Daftar Product</h5>
            </div>
            <div class="col-sm-7"></div>
            <div class="col-sm-2">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primaryc w-100 shadow-lg py-2">Create New
                    Product</a>
            </div>
        </div>
    </div>
@endsection
