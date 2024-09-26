@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Countries</h1>
    <a href="{{ route('countries.create') }}" class="btn btn-primary">Add Country</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
            <tr>
                <td>{{ $country->name }}</td>
                <td>
                    <a href="{{ route('countries.edit', $country) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('countries.destroy', $country) }}" method="POST" style="display:inline-block;">
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