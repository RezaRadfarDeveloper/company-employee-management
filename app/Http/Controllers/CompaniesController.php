<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Mail\CompanyEntered;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['create', 'store', 'update', 'destroy','edit']);
    }
    public function index()
    {
       $companies = Company::paginate(10);

        return view('companies.index',['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $validatedData = $request->validated();

         if($request->hasFile('logo')) {
                  $path = $request->file('logo')->store('/public');
                  $validatedData['logo'] =  substr($path, strrpos($path, '/') + 1);
         }

        $company = Company::create($validatedData);

        $admin = User::where('is_admin',true)->first();

        Mail::to($admin->email)->send(
            new CompanyEntered($company)
        );

        $request->session()->flash('status', 'Company was Added successfully');
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrfail($id);

        return view('companies.show',['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrfail($id);
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request, $id)
    {
        $validatedData = $request->validated();
        $company = Company::findOrfail($id);
        $hasFile =  $request->hasFile('logo');

        if($hasFile) {
            if($company->logo){
                File::delete(public_path('/storage/'.$company->logo));
                $path = $request->file('logo')->store('/public');
                $validatedData['logo'] =  substr($path, strrpos($path, '/') + 1);
            }
        }
        $company->update($validatedData);

        $request->session()->flash('status', 'Company  info was updated successfully');
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrfail($id);
        if($company->logo)
        {
            File::delete(public_path('/storage/'.$company->logo));
        }
        $company->delete();
        request()->session()->flash('status', 'Company  info was deleted successfully');

        return redirect()->route('companies.index');
    }
}
