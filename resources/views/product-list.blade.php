@extends('layouts.app')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Product List') }}</div>
                    <div class="card-body">
                        <a class="btn btn-primary float-end" href="{{ route('product.create') }}">
                            Add Product
                        </a>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('product.show', $product->id) }}">View</a>
                                            <a class="btn btn-warning"
                                                href="{{ route('product.edit', $product->id) }}">Edit</a>
                                            <form method="POST" action="{{ route('product.destroy', $product->id) }}"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h3>There is no product!</h3>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        @endsection
