<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;

class EmployeeController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
