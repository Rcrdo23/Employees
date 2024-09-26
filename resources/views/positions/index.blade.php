@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Positions</h1>
    <a href="{{ route('positions.create') }}" class="btn btn-primary">Add Position</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($positions as $position)
            <tr>
                <td>{{ $position->name }}</td>
                <td>
                    <a href="{{ route('positions.edit', $position) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('positions.destroy', $position) }}" method="POST" style="display:inline-block;">
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