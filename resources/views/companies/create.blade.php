@extends('layouts\app')
@section('content')
<div class="container ">
<form action="/companies/store" name="add_company" method="POST" class="form-group" enctype="multipart/form-data">
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
                  <h3>Add Company</h3>   
              </div>
          </div>
            <div class="row ">
                <div class="form-group col-md-6">
                  <label for="company_name">Company Name</label>
                  <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" value="{{old('name')}}" id="name" placeholder="Company name">
                    @if($errors->has('name'))
                      <span class="invalid-feedback">
                        <strong>{{$errors->first('name')}}</strong>
                      </span>
                    @endif
                </div>
                <div class="invalid-feedback">
                    This field is required!
                  </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Address</label>
                  <input type="text" class="form-control" name="address" value="{{old('address')}}" id="address" placeholder="Address">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <label for="company_name">Email</label>
                  <input type="text" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                  <label for="website">Website</label>
                  <input type="text" class="form-control" name="website" value="{{old('website')}}" id="website" placeholder="Website">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="employee_no">Number of Employee</label>
                  <input type="text" class="form-control" name="employee_no" value="{{old('employee_no') }}" id="email" placeholder="# Employee">
                </div>
              
                <div class="form-group col-md-6">
                  <label for="contact_no">Contact Number</label>
                  <input type="text" class="form-control" name="contact_no" value="{{old('contact_no')}}" id="email" placeholder="Contact Number">
                </div>
              </div>
              <div class="row ">
                <div class="col-md-6 form-group">
                    <label for="log">Upload Company Logo</label>
                    <input name="logo" type="file" class="form-control-file" id="logo">
                </div>
             </div>

             <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
@endsection

