@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="page-header">
        <h1>Edit User</h1>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="form-card">

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" class="form-control" autocomplete="new-password">
                <small>Leave blank to keep the existing password.</small>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                    autocomplete="new-password">
            </div>

            <div class="form-actions">
                <button type="submit" class="action-button">
                    Update User
                </button>

                <a href="{{ route('users.index') }}" class="secondary-button">
                    Cancel
                </a>
            </div>

        </form>

    </div>
@endsection
