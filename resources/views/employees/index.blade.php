@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employees</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Identification</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Country</th>
                <th>City</th>
                <th>Position</th>
                <th>Supervisor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->identification }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->country->name }}</td>
                <td>{{ $employee->city->name }}</td>
                <td>{{ $employee->position->name }}</td>
                <td>{{ $employee->supervisor ? $employee->supervisor->first_name . ' ' . $employee->supervisor->last_name : 'N/A' }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection