<?php

namespace App\Http\Controllers;

use App\Models\EmployeeGroup;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeGroupController extends Controller
{
    public function index()
    {
        $employee_groups = EmployeeGroup::with('leader', 'members')->get();
        return view('employee_groups.index', compact('employee_groups'));
    }

    public function create()
    {
        $leaders = Employee::whereIn('position_id', [1, 2])->get(); // assuming 1 and 2 are IDs for President and Manager
        $members = Employee::all();
        return view('employee_groups.create', compact('leaders', 'members'));
    }

    public function store(Request $request)
    {
        $group = EmployeeGroup::create([
            'name' => $request->name,
            'leader_id' => $request->leader_id, // Asumiendo que el líder se pasa en la solicitud
        ]);
    
        // Agregar miembros al grupo, si hay miembros seleccionados
        if ($request->has('member_ids')) {
            $group->members()->sync($request->member_ids);
        }
    
        return redirect()->route('employee_groups.index')->with('success', 'Group created successfully.');
    }

    public function edit(EmployeeGroup $group)
    {
        $leaders = Employee::whereIn('position_id', [1, 2])->get();
        $members = Employee::all();
        return view('employee_groups.edit', compact('group', 'leaders', 'members'));
    }

    public function update(Request $request, EmployeeGroup $group)
    {
        $group->update($request->all());
        $group->members()->sync($request->member_ids);
        return redirect()->route('employee_groups.index');
    }

    public function destroy(EmployeeGroup $group)
    {
        $group->delete();
        return redirect()->route('employee_groups.index');
    }
}
