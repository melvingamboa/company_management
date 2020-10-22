@extends('layouts\app')

@section('title', 'Edit Details for '. $company->name)

@section('content')
<div class="container ">
<form action="/companies/{{$company->company_id}}" name="add_company" method="POST" class="form-group" enctype="multipart/form-data">
  {{method_field('PATCH')}}
    @csrf
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12 form-group">
                    <h3>Edit Details for {{$company->name}}</h3>   
                </div>
            </div>
            <div class="row ">
                <div class="form-group col-md-6">
                  <label for="company_name">Company Name</label>
                  <input type="text" class="form-control in-valid" name="name" value="{{ old('name') ?? $company->name}}" id="name" placeholder="Company name">
                </div>
                <div class="invalid-feedback">
                    This field is required!
                  </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Address</label>
                  <input type="text" class="form-control" name="address" value="{{old('address') ?? $company->address}}" id="address" placeholder="Address">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="company_name">Email</label>
                  <input type="text" class="form-control" name="email" value="{{old('email') ?? $company->email }}" id="email" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="website">Website</label>
                  <input type="text" class="form-control" name="website" value="{{old('website') ?? $company->website }}" id="website" placeholder="Website">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="employee_no">Number of Employee</label>
                  <input type="text" class="form-control" name="employee_no" value="{{old('employee_no') ?? $company->employee_no }}" id="email" placeholder="# Employee">
                </div>
              
                <div class="form-group col-md-6">
                  <label for="contact_no">Contact Number</label>
                  <input type="text" class="form-control" name="contact_no" value="{{old('contact_no') ?? $company->contact_no }}" id="email" placeholder="Contact Number">
                </div>
              </div>
              <div class="row ">
                <div class="col-md-6 form-group">
                    <label for="exampleFormControlFile1">Upload Company Logo</label>
                    <input name="logo" type="file" class="form-control-file" id="logo" value="{{ $company->logo }}">
                </div>
             </div>

             <button type="submit" class="btn btn-primary">Save Company</button>
          </form>
    </div>
@endsection

