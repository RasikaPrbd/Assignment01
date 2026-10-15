@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

    <div class="page-header">
        <h1>Edit Customer</h1>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="form-card">

        <form method="POST" action="{{ route('customers.update', $customer->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" class="form-control"
                    value="{{ old('firstName', $customer->firstName) }}" required>
            </div>

            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" class="form-control"
                    value="{{ old('lastName', $customer->lastName) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', $customer->email) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control"
                    value="{{ old('phone', $customer->phone) }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" class="form-control" rows="4" required>{{ old('address', $customer->address) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="action-button">
                    Update Customer
                </button>

                <a href="{{ route('customers.index') }}" class="secondary-button">
                    Cancel
                </a>
            </div>

        </form>

    </div>

@endsection
