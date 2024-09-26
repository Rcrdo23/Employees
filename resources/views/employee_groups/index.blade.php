@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Groups</h1>
    <a href="{{ route('employee_groups.create') }}" class="btn btn-primary">Add Group</a>
    <table class="table">
        <thead>
            <tr>
                <th>Group Name</th>
                <th>Leader</th>
                <th>Members</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee_groups as $group)
            <tr>
                <td>{{ $group->name }}</td>
                <td>{{ $group->leader->first_name }} {{ $group->leader->last_name }}</td>
                <td>
                    @foreach ($group->members as $member)
                        {{ $member->first_name }} {{ $member->last_name }}<br>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('employee_groups.edit', $group) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('employee_groups.destroy', $group) }}" method="POST" style="display:inline-block;">
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