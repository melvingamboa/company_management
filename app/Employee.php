<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table      = 'employees';

    protected $primaryKey = 'employee_id';
    protected $guarded    = [];


    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords(strtolower($value));
    }

    public function getFullNameAttribute()
    {
        return  $this->attributes['first_name'] ." ". $this->attributes['last_name'];
    }

    public function getEmployeeCompany($employee_id)
    {
        $company = DB::table('companies')
                ->select('companies.name','employees.first_name')
                ->join('employees', 'employees.company_id','companies.company_id')
                ->where('employees.employee_Id',$employee_id)
                ->first();
                
        return $company;
    }

}
