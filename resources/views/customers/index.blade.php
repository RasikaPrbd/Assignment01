@extends('layouts.app')

@section('title', 'Customer Management')

@section('content')

    <div class="page-header">
        <h1>Customer Management</h1>

        <a href="{{ route('customers.create') }}" class="action-button">
            Create New Customer
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->firstName }}</td>
                        <td>{{ $customer->lastName }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>

                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('customers.destroy', $customer->id) }}"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this customer?');">
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
                        <td colspan="7">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
