@extends('layouts.app')

@section('title', 'User Management')

@section('content')

    <div class="page-header">
        <h1>User Management</h1>

        <a href="{{ route('users.create') }}" class="action-button">
            Create New User
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
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created Date</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at?->format('Y-m-d') }}</td>

                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this user?');">
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
                        <td colspan="6">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
