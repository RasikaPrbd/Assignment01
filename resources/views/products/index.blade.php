@extends('layouts.app')

@section('title', 'Product Management')

@section('content')

    <div class="page-header">
        <h1>Product Management</h1>

        <a href="{{ route('products.create') }}" class="action-button">
            Create New Product
        </a>
    </div>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-wrap">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Cost</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>{{ number_format((float) $product->cost, 2) }}</td>
                        <td>{{ number_format((float) $product->price, 2) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->description }}</td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete-button">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
