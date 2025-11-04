<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Default dashboard page
    public function index()
    {
        return view('admins.dashboard'); 
    }

    // Add this method for /dashboard/{id} route
    public function show($id)
    {
        // Example: you can later fetch data from DB using $id
        return view('admins.dashboard', compact('id'));
    }
}
