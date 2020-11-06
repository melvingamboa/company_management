<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\StoreEmployee;

use App\Employee;
use App\Company;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        // $except = [
        //     'except' => ['index', 'show']
        // ];
        $this->middleware('auth');
    }
    
    public function ajaxEmployees(){
        $employees = Employee::all();

        return response()->json(['data'=> $employees]);
    } 

    public function index()
    {
        $employees          = Employee::all();
        $companies          = Company::orderBy('name', 'asc')->get();

        return view('employees.index')->with(["companies"=> $companies, 'employees'=> $employees]);
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Will return only validated data

        //   $validator = $request->validate([
        //     'first_name'    => 'required',
        //     'last_name'     => 'required',
        //     'age'           => 'required',
        //     'position'      => 'required'
        // ]);

        // $validator = $request->validated(); 

        $validator = Validator::make($request->all(), [
                'first_name'    => 'required',
                'last_name'     => 'required',
                'age'           => 'required',
                'position'      => 'required',
                'company'       => 'required',
                'email'         => 'required|unique:employees|email:rfc,dns',
                'phone'         => 'nullable|digits:11'
        ]);

        if ($validator->passes()) {
            
            $employee = new Employee;
            $employee->first_name       = ucwords(strtolower($request->first_name));
            $employee->last_name        = ucwords(strtolower($request->last_name));
            $employee->age              = $request->age;
            $employee->position         = $request->position;
            $employee->email            = $request->email;
            $employee->company_id       = $request->company;
            $employee->save();

             return response()->json(['success' => 'Employee has been added',]);
        }
          
            return response()->json(['error' => $validator->errors()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($employee_id)
    {
        $employeeCompany = new Employee;
        $company_name    = $employeeCompany->getEmployeeCompany($employee_id);

        $employee       = Employee::find($employee_id);

        return view('employees.show',['employee'=>$employee, 'company'=>$company_name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit_employees($id)
    {
        $employees_info = Employee::find($id);

        return response()->json(['data'=> $employees_info]);
        // return view('employees.index')->with(["employees_info"=> $employees_info]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee_id)
    {
        
            $validatedData = $request->validate([
                'first_name'    => 'required',
                'last_name'     => 'required',
                'age'           => 'required',
                'position'      => 'required',
                'company'       => 'required',
                'email'         => 'required|email:rfc,dns',
                'phone'         => 'nullable|digits:11'
            ]);
                
            $employee = Employee::find($employee_id);

            print_r($employee);die;

            $employee->update($validatedData);
         
            return redirect('employees/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id)
    {

        $employee = Employee::find($employee_id);
        $employee->delete();

        return redirect('employees/index')->with('success', 'Employee has been deleted!');

    }
}
