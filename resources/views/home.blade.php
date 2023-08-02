@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success mb-3">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Product List') }}</div>
                    <div class="card-body">
                        @auth
                            <a class="btn btn-primary float-end mb-3" href="{{ route('product.create') }}">
                                Add Product
                            </a>
                        @endauth
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('product.show', $product->id) }}">View</a>
                                            @auth

                                                <a class="btn btn-warning"
                                                    href="{{ route('product.edit', $product->id) }}">Edit</a>
                                                <form method="POST" action="{{ route('product.destroy', $product->id) }}"
                                                    class="d-inline" onsubmit="return handleDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        Delete
                                                    </button>
                                                </form>
                                            @endauth
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th class="text-center" colspan="10">
                                            No product found!
                                        </th>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function handleDelete() {
            return window.confirm("Are you want to delete?")
        }
    </script>
@endsection
