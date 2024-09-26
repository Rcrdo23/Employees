@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($country) ? 'Edit Country' : 'Add Country' }}</h1>
    <form action="{{ isset($country) ? route('countries.update', $country) : route('countries.store') }}" method="POST">
        @csrf
        @if(isset($country))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($country) ? $country->name : '' }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($country) ? 'Update' : 'Add' }}</button>
    </form>
</div>
@endsection