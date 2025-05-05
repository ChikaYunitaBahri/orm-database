<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Models\Skill;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['company', 'skills'])->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        $skills = Skill::all();
        return view('employees.create', compact('companies', 'skills'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'skills' => 'array'
        ]);

        $employee = Employee::create([
            'name' => $validated['name'],
            'company_id' => $validated['company_id']
        ]);

        $employee->skills()->attach($validated['skills'] ?? []);
        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        $skills = Skill::all();
        return view('employees.edit', compact('employee', 'companies', 'skills'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'skills' => 'array'
        ]);

        $employee->update([
            'name' => $validated['name'],
            'company_id' => $validated['company_id']
        ]);

        $employee->skills()->sync($validated['skills'] ?? []);
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
