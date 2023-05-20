<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Mail\CompanyCreated;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = array(
            array('key' => 'id', 'label' => 'ID', 'type' => 'text'),
            array('key' => 'logo', 'label' => 'Logo', 'type' => 'image'),
            array('key' => 'name', 'label' => 'Name', 'type' => 'text'),
            array('key' => 'email', 'label' => 'Email', 'type' => 'text'),
            array('key' => 'website', 'label' => 'Website', 'type' => 'text')
        );
        $companies = Company::paginate(10);
        return view('company.index', compact('companies', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $validatedData = $request->validated();
    
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('public/logos');
            $validatedData['logo'] = $logoPath;
        }

        $company = Company::create($validatedData);

        // Send email notification
        Mail::to('donadoniman@gmail.com')->send(new CompanyCreated($company));

        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fields = array(
            array('key' => 'id', 'label' => 'ID', 'type' => 'text'),
            array('key' => 'logo', 'label' => 'Logo', 'type' => 'image'),
            array('key' => 'name', 'label' => 'Name', 'type' => 'text'),
            array('key' => 'email', 'label' => 'Email', 'type' => 'text'),
            array('key' => 'website', 'label' => 'Website', 'type' => 'text')
        );
        $company = Company::findOrFail($id);
        return view('company.show', compact('id', 'company', 'fields'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('id', 'company'));
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
