@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Welcome to the Employee Management System</h1>
    <p class="lead">Manage employees, positions, cities, and employee groups with ease.</p>
    <hr class="my-4">
    <p>Use the navigation bar above to get started.</p>
</div>
<div class="row text-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Employees</h5>
                <p class="card-text">View, create, edit, and delete employees.</p>
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Manage Employees</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Positions</h5>
                <p class="card-text">View, create, edit, and delete positions.</p>
                <a href="{{ route('positions.index') }}" class="btn btn-primary">Manage Positions</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Cities</h5>
                <p class="card-text">View, create, edit, and delete cities.</p>
                <a href="{{ route('cities.index') }}" class="btn btn-primary">Manage Cities</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Employee Groups</h5>
                <p class="card-text">View, create, edit, and delete employee groups.</p>
                <a href="{{ route('employee_groups.index') }}" class="btn btn-primary">Manage Employee Groups</a>
            </div>
        </div>
    </div>
</div>
@endsection