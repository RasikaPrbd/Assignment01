@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

    <div class="page-header">
        <h1>Edit Product</h1>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="form-card">

        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="form-group">
                <label for="code">Product Code</label>
                <input type="text" id="code" name="code" class="form-control"
                    value="{{ old('code', $product->code) }}" required>
            </div>

            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="number" id="cost" name="cost" class="form-control" min="0" step="0.01"
                    value="{{ old('cost', $product->cost) }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" min="0" step="0.01"
                    value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control" min="0" step="1"
                    value="{{ old('quantity', $product->quantity) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="action-button">
                    Update Product
                </button>

                <a href="{{ route('products.index') }}" class="secondary-button">
                    Cancel
                </a>
            </div>

        </form>

    </div>

@endsection
