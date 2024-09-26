@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($position) ? 'Edit Position' : 'Add Position' }}</h1>
    <form action="{{ isset($position) ? route('positions.update', $position) : route('positions.store') }}" method="POST">
        @csrf
        @if(isset($position))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($position) ? $position->name : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($position) ? 'Update' : 'Add' }}</button>
    </form>
</div>
@endsection