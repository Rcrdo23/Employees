@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($employee) ? 'Edit Employee' : 'Add Employee' }}</h1>
    <form action="{{ isset($employee) ? route('employees.update', $employee) : route('employees.store') }}" method="POST">
        @csrf
        @if(isset($employee))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ isset($employee) ? $employee->first_name : '' }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ isset($employee) ? $employee->last_name : '' }}">
        </div>
        <div class="form-group">
            <label for="identification">Identification</label>
            <input type="text" name="identification" class="form-control" value="{{ isset($employee) ? $employee->identification : '' }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ isset($employee) ? $employee->address : '' }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ isset($employee) ? $employee->phone : '' }}">
        </div>
        <div class="form-group">
            <label for="country_id">Country</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ isset($employee) && $employee->country_id == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="city_id">City</label>
            <select name="city_id" id="city_id" class="form-control">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ isset($employee) && $employee->city_id == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="position_id">Position</label>
            <select name="position_id" class="form-control">
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ isset($employee) && $employee->position_id == $position->id ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="supervisor_id">Supervisor</label>
            <select name="supervisor_id" class="form-control">
                @foreach ($supervisors as $supervisor)
                    <option value="{{ $supervisor->id }}" {{ isset($employee) && $employee->supervisor_id == $supervisor->id ? 'selected' : '' }}>
                        {{ $supervisor->first_name }} {{ $supervisor->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($employee) ? 'Update' : 'Add' }}</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('country_id').addEventListener('change', function () {
        fetch(`/api/countries/${this.value}/cities`)
            .then(response => response.json())
            .then(data => {
                let citySelect = document.getElementById('city_id');
                citySelect.innerHTML = '';
                data.forEach(city => {
                    let option = document.createElement('option');
                    option.value = city.id;
                    option.text = city.name;
                    citySelect.appendChild(option);
                });
            });
    });
</script>
@endsection