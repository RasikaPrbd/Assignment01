<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCustomers = Customer::count();
        $totalProducts = Product::count();

        return view('dashboard', compact('totalUsers', 'totalProducts', 'totalCustomers'));
    }
}
