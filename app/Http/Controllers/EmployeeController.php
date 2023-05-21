<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = array(
            array('key' => 'id', 'label' => 'ID', 'type' => 'text'),
            array('key' => 'first_name', 'label' => 'First Name', 'type' => 'text'),
            array('key' => 'last_name', 'label' => 'Last Name', 'type' => 'text'),
            array('key' => 'company.name', 'label' => 'Company', 'type' => 'text'),
            array('key' => 'email', 'label' => 'Email', 'type' => 'text'),
            array('key' => 'phone', 'label' => 'Phone', 'type' => 'text')
        );

        $employees = Employee::with('company')->paginate(10);
        return view('employee.index', compact('employees', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $validatedData = $request->validated();

        $employee = Employee::create($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fields = array(
            array('key' => 'id', 'label' => 'ID', 'type' => 'text'),
            array('key' => 'first_name', 'label' => 'First Name', 'type' => 'text'),
            array('key' => 'last_name', 'label' => 'Last Name', 'type' => 'text'),
            array('key' => 'email', 'label' => 'Email', 'type' => 'text'),
            array('key' => 'phone', 'label' => 'Phone', 'type' => 'text')
        );
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('id', 'employee', 'fields'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = Company::all();
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('id', 'employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $validatedData = $request->validated();

        $employee = Employee::findOrFail($id);

        $employee->update($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
