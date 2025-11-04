
@extends('layouts.master')

@section('page_title')
Dashboard
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
    <div class="btn-toolbar mb-2 mb-md-0">
        <button type="button" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-plus-lg"></i> Add New
        </button>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
    <div class="col">
        <div class="card text-white bg-primary h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">120</h5>
                    <p class="card-text">New Users</p>
                </div>
                <i class="bi bi-person-fill fs-1"></i>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-success h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">$5,450</h5>
                    <p class="card-text">Revenue</p>
                </div>
                <i class="bi bi-graph-up fs-1"></i>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-warning h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">34</h5>
                    <p class="card-text">Pending Tasks</p>
                </div>
                <i class="bi bi-clock-fill fs-1"></i>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-danger h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">8</h5>
                    <p class="card-text">Alerts</p>
                </div>
                <i class="bi bi-exclamation-circle-fill fs-1"></i>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Recent Orders</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#12345</td>
                        <td>Laptop</td>
                        <td>Jane Doe</td>
                        <td><span class="badge bg-success">Shipped</span></td>
                        <td>$1,200</td>
                    </tr>
                    <tr>
                        <td>#12346</td>
                        <td>Smartphone</td>
                        <td>John Smith</td>
                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                        <td>$800</td>
                    </tr>
                    <tr>
                        <td>#12347</td>
                        <td>Monitor</td>
                        <td>Emily White</td>
                        <td><span class="badge bg-danger">Cancelled</span></td>
                        <td>$350</td>
                    </tr>
                    <tr>
                        <td>#12348</td>
                        <td>Keyboard</td>
                        <td>Michael Brown</td>
                        <td><span class="badge bg-info text-dark">Processing</span></td>
                        <td>$75</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
