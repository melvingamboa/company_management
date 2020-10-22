<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CompanyStoreRequest;



use App\Company;



class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //call the function in company model
        $this->CompanyModel = new \App\Company();

        // $except = [
        //     'except' => ['index', 'show']
        // ];
        $this->middleware('auth');
    }
    public function index()
    {
        
        $auth_user_id = auth()->user()->id;

        $role =  Auth::User()->admin;
       //query builder

       if($role == "Y"){
        $companies = DB::table('companies')
                ->paginate(10);
       }else{
            $companies = DB::table('companies')
                ->where('user_id','=',$auth_user_id)
                ->paginate(10)
                ;
       }

        return view('companies.index')->with('companies', $companies);
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
    public function store(CompanyStoreRequest $request)
    {

        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|unique:companies',
        //     'address' => 'required',
        //     'website' => 'required',
        //     'contact_no' => "nullable",
        //     'employee_no' => "nullable",
        //     'logo' => 'required|mimes:jpeg,png,bmp,tiff |max:4096',
        // ]);
        $validatedData = $request->validated();

        if($request->hasFile('logo')){
            //get filenmae with extension
            $filename_ext = $request->file('logo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            //filename to store
            $filename_to_store = $filename.".".$extension;
            // path to upload image
            $path = $request->file('logo')->storeAs('public/logo', $filename_to_store);

            $validatedData['logo'] = $filename_to_store;
        }
        $validatedData['user_id']  = auth()->user()->id;
        
        Company::create($validatedData);

        return redirect('/companies/index')->with('success', 'Company successfuly added.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company_id)
    {
        $company = Company::find($company_id);

        return view('companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id)
    {

        $company = Company::find($company_id);

       
        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company_id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'address' => 'required',
            'website' => 'required',
            'contact_no' => "nullable",
            'employee_no' => "nullable",
            'logo' => 'mimes:jpeg,png,bmp,tiff |max:4096',
        ]);

        if($request->hasFile('logo')){
            //get filenmae with extension
            $filename_ext = $request->file('logo')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            //filename to store
            $filename_to_store = $filename.".".$extension;
            // path to upload image
            $path = $request->file('logo')->storeAs('public/logo', $filename_to_store);

            $validatedData['logo'] = $filename_to_store;
        }
            
        $company = Company::find($company_id);
        $company->update($validatedData);
     
        return redirect('companies/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id)
    {

        $company = Company::find($company_id);
 
        if($company->logo){
            Storage::delete('public/logo/'.$company->logo);
        }

        $company->delete();

        return redirect('/companies/index')->with('success', 'Company successfuly deleted.');
    }
}
