@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="page-header">
        <div>
            <h1>Admin Dashboard</h1>
            <p>Welcome to your administration panel.</p>
        </div>
    </div>

    <div class="stats-grid">

        <div class="stat-card">
            <h3>Total Users</h3>
            <p class="stat-number">{{ $totalUsers }}</p>
        </div>

        <div class="stat-card">
            <h3>Total Customers</h3>
            <p class="stat-number">{{ $totalCustomers }}</p>
        </div>

        <div class="stat-card">
            <h3>Total Products</h3>
            <p class="stat-number">{{ $totalProducts }}</p>
        </div>

    </div>

@endsection
