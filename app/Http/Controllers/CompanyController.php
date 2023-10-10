<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Libs\CompanyLib;
use App\Http\Requests\CompanySave;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyController extends Controller
{
    private $company_lib;

    public function __construct(CompanyLib $company_lib)
    {
        $this->company_lib = $company_lib;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $companies = $this->company_lib->index();

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanySave  $request
     * @return RedirectResponse
     */
    public function store(CompanySave $request): RedirectResponse
    {
        $data = $request->validated();

        $this->company_lib->store($data);

        return redirect()->route('companies.index')->with('success', 'Company has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\company  $company
     * @return View
     */
    public function show(Company $company): View
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Company  $company
     * @return View
     */
    public function edit(Company $company): View
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanySave $request
     * @param \App\company  $company
     * @return RedirectResponse
     */
    public function update(CompanySave $request, Company $company): RedirectResponse
    {
        $request->validated();
        $this->company_lib->update($request->all(), $company);

        return redirect()->route('companies.index')->with('success', 'Company Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Company  $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        $this->company_lib->destroy($company);

        return redirect()->route('companies.index')->with('success', 'Company has been deleted successfully');
    }
}
