@extends('layouts.app')
@section('employee_js')
  <script src="{{ asset('js/employee.js') }}"></script> 
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center form-group">
    <div id="message"></div>
        @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="col-md-12"> {{ session('success') }}</div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="col-md-10">
           <h3>Employee List</h3>
        </div>
        <!-- Button trigger modal -->
        <div class="col-md-2 pb-1">
            <a class="btn btn-outline-primary float-right" data-toggle="modal" role="button" id="add_employee" data-target="#exampleModal">Add Employee</a>
         </div>
        <div class="col-md-12">
       {{csrf_field()}}
             <table id="myTable" class="table cell-border display">
                <thead class="">
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="15%"></td>
                    <td width="20%"></td>
                    <td width="20%"></td>
                    <td width="15%"></td>
                    <td style="display:flex"></td>
                  </tr>
                  {{-- @foreach ($employees as $employee)
                        <tr>
                            <td width="15%">{{$employee->first_name." ".$employee->last_name}}</td>
                            <td width="20%">{{$employee->position}}</td>
                        <td width="20%">{{$employee->email}}</td>
                        <td width="15%">{{$employee->status}}</td>
                            <td style="display:flex">
                            <div>
                                <a href="/companies/{" class="btn btn-secondary btn-sm">View</a>
                            <a href="/companies/edit/" class="btn btn-primary btn-sm">Edit</a>
                            </div>&nbsp;  
                            <div>
                            <form action="{{url('employees/destroy/'.$employee->employee_id)}}" method="POST">
                                  {{method_field('DELETE')}}
                                  
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                              </form>
                            </div>
                            </td>
                          </tr>
                  @endforeach --}}
                 @csrf
                </tbody>
              </table>
              <?php //echo $companies->links(); ?>
        </div>
    </div>
{{-- Modal Section --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Employee Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       <form action="" name="employee_form" id="employee_form" class="form-horizontal form-group" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
       
          <div class="row">
            <div class="col-md-12 form-group ">
              <label for="first_name">Company</label>
              <select name="company" id="company" class="form-control">
                <option value="">Select Company</option>
                  @foreach ($companies as $company)
              <option value="{{$company->company_id}}">{{$company->name}}</option>
                  @endforeach
              </select>
                <span class="text-danger">
                  <strong id="company-error"></strong>
                </span>
            </div>
        </div>

          <div class="row">
              <div class="col-md-6 form-group ">
                <label for="first_name">First Name</label>
                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First name">
                  <span class="text-danger">
                    <strong id="first_name-error"></strong>
                  </span>
              </div>
              <div class="col-md-6 form-group ">
                <label for="last_name">Last name</label>
                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last name">
                <span class="text-danger">
                  <strong id="last_name-error"></strong>
                </span>
              </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group ">
              <label for="employee_age">Age</label>
              <input class="form-control" type="text" name="age" id="age" placeholder="Age">
              <span class="text-danger">
                <strong id="age-error"></strong>
              </span>
            </div>
            <div class="col-md-6 form-group ">
              <label for="position">Position</label>
              <input class="form-control" type="text" name="position" id="position" placeholder="Positon">
              <span class="text-danger">
                <strong id="position-error"></strong>
              </span>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 form-group ">
              <label for="employee_age">Email</label>
              <input class="form-control" type="text" name="email" id="email" placeholder="Email">
              <span class="text-danger">
                <strong id="email-error"></strong>
              </span>
            </div>
            <div class="col-md-6 form-group ">
              <label for="position">Phone Number</label>
              <input class="form-control" type="text" name="phone" id="phone" placeholder="Phone Number">
              <span class="text-danger">
                <strong id="phone-error"></strong>
              </span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form> 
      </div>
    </div>
  </div>

</div>
@endsection

