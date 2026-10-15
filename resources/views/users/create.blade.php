@extends('layouts.app')

@section('title', 'Create Product')

@section('content')

    <div class="page-header">
        <h1>Create New User</h1>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="form-card">

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" autocomplete="new-password"
                    required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    autocomplete="new-password" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="action-button">
                    Create User
                </button>

                <a href="{{ route('users.index') }}" class="secondary-button">
                    Cancel
                </a>
            </div>

        </form>

    </div>
@endsection
