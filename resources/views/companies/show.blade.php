@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
             <img  class="img-fluid" src="/storage/logo/{{$company->logo}}" alt="company logo"">
            </div>
        </div>
        <table class="table table-borderless table-sm">
            <tr>
                <td width="11%">Name</td>
                <td>{{$company->name}}</td>
            </tr>
            <tr>
                <td>Location</td>
                <td>{{$company->address}}</td>
            </tr>
            <tr>
                <td>Website</td>
                <td>{{$company->website}}</td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td>{{$company->email}}</td>
            </tr>
            <tr>
                <td>No Employees:</td>
                <td>{{$company->employee_no}}</td>
            </tr>
        </table>
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-outline-secondary" href="#" role="button">List of Employees</a>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-11">
             <img class="w-15 h-90" src="/storage/logo/{{$company->logo}}" alt="company logo">
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 pt-3">
       
                <label class="font-weight-bold" for="name">Name: </label> 
            </div>
            <div class="col-md-10 pt-3">
                <label class="" for="name">{{$company->name}}ss </label> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <label class="font-weight-bold" for="address">Location: </label>
            </div>
            <div class="col-md-10 ">
                <label class="" for="name"> {{$company->address}} </label> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <label class="font-weight-bold" for="website">Website: </label> 
            </div>
            <div class="col-md-10 ">
                <label class="" for="name"> {{$company->website}} </label> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                <label class="font-weight-bold" for="website">Email Address: </label> 
            </div>
            <div class="col-md-10 ">
                <label class="" for="name"> {{$company->email}} </label> 
            </div>
        </div>


        <div class="row">
            <div class="col-md-1">
                <label class="font-weight-bold" for="website">No Employees: </label> 
            </div>
            <div class="col-md-10 ">
                <label class="" for="name"> 13 </label> 
            </div>
        </div>  -->
    </div>
@endsection