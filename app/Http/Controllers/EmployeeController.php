<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Country;
use App\Models\City;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['country', 'city', 'position', 'supervisor'])->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $positions = Position::all();
        $supervisors = Employee::where('position_id', '!=', 1)->get(); // Assume 1 is the President position ID
        return view('employees.create', compact('countries', 'cities', 'positions', 'supervisors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'identification' => 'required|unique:employees',
            'address' => 'required',
            'phone' => 'required',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'position_id' => 'required|exists:positions,id',
            'supervisor_id' => 'nullable|exists:employees,id'
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $countries = Country::all();
        $cities = City::all();
        $positions = Position::all();
        $supervisors = Employee::where('position_id', '!=', 1)->get(); // Assume 1 is the President position ID
        return view('employees.edit', compact('employee', 'countries', 'cities', 'positions', 'supervisors'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'identification' => 'required|unique:employees,identification,' . $employee->id,
            'address' => 'required',
            'phone' => 'required',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'position_id' => 'required|exists:positions,id',
            'supervisor_id' => 'nullable|exists:employees,id'
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
