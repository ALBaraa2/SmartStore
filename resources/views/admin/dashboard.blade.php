@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Welcome, Admin!</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-4">
                <div class="card-body">
                    <h5 class="card-title">Manage Products</h5>
                    <p class="card-text">Add, edit or delete supermarket items.</p>
                    <a href="#" class="btn btn-light btn-sm">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-4">
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">View and manage customer accounts.</p>
                    <a href="#" class="btn btn-light btn-sm">View Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-4">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">Review customer orders and update status.</p>
                    <a href="#" class="btn btn-light btn-sm">View Orders</a>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h5>Quick Stats</h5>
    <div class="row">
        <div class="col-md-3">
            <div class="card border-start border-primary border-4 shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Products</h6>
                    <h4>{{ $productCount ?? '0' }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-start border-success border-4 shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="text-muted">Total Users</h6>
                    <h4>{{ $userCount ?? '0' }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-start border-warning border-4 shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="text-muted">Pending Orders</h6>
                    <h4>{{ $pendingOrders ?? '0' }}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection
