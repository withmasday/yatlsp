@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('DataTables/datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection

@section('content')
    <div id="particles-js"></div>
    <div class="container bg-white rounded-3 shadow-lg p-3">
        <div class="row">
            <div class="col-sm-3">
                <h5 class="text-primary pt-2 d-inline-block">Daftar Brand</h5>
                <div class="badge bg-primary d-inline-block ms-2">{{ count($data) }}</div>
            </div>
            <div class="col-sm-7"></div>
            <div class="col-sm-2">
                <a href="{{ route('admin.brand.create') }}" class="btn btn-primaryc w-100 shadow-lg py-2">Create Brand</a>
            </div>
        </div>
    </div>

    <div class="container mt-4 bg-white rounded-3 shadow-lg p-3">
        <table class="table table-white mt-3" id="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center text-primary" style="width: 25px;">No</th>
                    <th scope="col" class="text-center text-primary">Brand Name</th>
                    <th scope="col" class="text-center text-primary">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $brand)
                    <tr>
                        <td scope="row" class="text-center text-secondary">{{ $key + 1 }}</td>
                        <td class="text-secondary">{{ $brand->name }}</td>
                        <td class="text-center text-secondary" style="width: 200px;">
                            <a href="#" class="btn btn-primaryc me-2 shadow-lg">
                                <i class="bi bi-pen-fill me-1"></i> Edit
                            </a>
                            <a href="#" class="btn btn-dangerc me-2 shadow-lg">
                                <i class="bi bi-trash-fill me-1"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
