@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center form-group">
        <div class="col-md-10">
           <h3>Companies</h3>
        </div>
    </div>
        <div class="col-md-2">
            <a class="btn btn-outline-primary float-right" href="/companies/create" role="button">Add Company</a>
         </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Website</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($companies as $company)
                    <tr>
                      <th scope="row"></th>
                      <td>{{$company->name}}</td>
                      <td>{{$company->address}}</td>
                      <td>{{$company->website}}</td>
                      <td></td>
                    </tr>    
                  @endforeach
                </tbody>
              </table>
        
        </div>
    </div>
</div>
@endsection
