<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Company;
use App\Profile;


class ProfilesController extends Controller
{
    //

    public function list()
    {

        // $json = file_get_contents('http://dummy.restapiexample.com/api/v1/employees');
        // $json =  Http::get('http://dummy.restapiexample.com/api/v1/employees')->json();
        $json =  Http::get('https://jsonplaceholder.typicode.com/posts')->body();
        // echo "<pre>";
        // print_r($json);die;

        // $data_array = array();
        // foreach($json as $val)
        // // foreach($json['data'] as $key => $val)
        // {
        //     $data_array[] = array(
        //         'employee_name'     => $val['employee_name'],
        //         'employee_salary'   => $val['employee_salary'],
        //         'employee_age'      => $val['employee_age']
        //       );
        // }

        // echo "<pre>";
        // print_r($data_array);die;
        // Profile::insert($data_array);
        return view('profiles')->with('emplist', $json);
        
    }
} 
  