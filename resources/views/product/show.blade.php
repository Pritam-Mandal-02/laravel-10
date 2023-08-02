@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Product Detail') }}</div>
                    <div class="card-body">
                        <a class="btn btn-primary float-end" href="{{ route('home') }}">
                            Back
                        </a>
                        <table class="table table-striped">
                            <tr>
                                <th>Name :</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Category :</th>
                                <td>
                                    {{ $product->category->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>Description :</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Price :</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Status :</th>
                                <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                            </tr>
                            <tr>
                                <th>Image :</th>
                                <td>
                                    <img src="{{ url('/uploads/products/' . $product->image) }}" width="100"
                                        height="100" alt="{{ $product->name }}">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
