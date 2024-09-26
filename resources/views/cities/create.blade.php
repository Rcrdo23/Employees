@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($city) ? 'Edit City' : 'Add City' }}</h1>
    <form action="{{ isset($city) ? route('cities.update', $city) : route('cities.store') }}" method="POST">
        @csrf
        @if(isset($city))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ isset($city) ? $city->name : '' }}">
        </div>
        <div class="form-group">
            <label for="country_id">Country</label>
            <select name="country_id" class="form-control">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ isset($city) && $city->country_id == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($city) ? 'Update' : 'Add' }}</button>
    </form>
</div>
@endsection