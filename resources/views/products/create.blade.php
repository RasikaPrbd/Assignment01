@extends('layouts.app')

@section('title', 'Create Product')

@section('content')

    <div class="page-header">
        <h1>Create New Product</h1>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="form-card">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="code">Product Code</label>
                <input type="text" id="code" name="code" class="form-control" value="{{ old('code') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="cost">Cost</label>
                <input type="number" id="cost" name="cost" class="form-control" min="0" step="0.01"
                    value="{{ old('cost') }}" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" min="0" step="0.01"
                    value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control" min="0" step="1"
                    value="{{ old('quantity') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="action-button">
                    Create Product
                </button>

                <a href="{{ route('products.index') }}" class="secondary-button">
                    Cancel
                </a>
            </div>
        </form>
    </div>

@endsection
