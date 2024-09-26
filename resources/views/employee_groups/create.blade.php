@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Employee Group</h1>
    
    <form action="{{ route('employee_groups.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Group Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="leader_id">Select Leader</label>
            <select name="leader_id" id="leader_id" class="form-control" required>
                @foreach($leaders as $leader)
                    <option value="{{ $leader->id }}">{{ $leader->first_name }} {{ $leader->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="member_ids">Select Members</label>
            <select name="member_ids[]" id="member_ids" class="form-control" multiple>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->first_name }} {{ $member->last_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Group</button>
    </form>
    
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
</div>
@endsection