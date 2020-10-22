@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center form-group">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="col-md-12"> {{ session('success') }}</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        <div class="col-md-10">
           <h3>Company List</h3>
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
                    <th width="25%" scope="col">Address</th>
                    <th width="25%" scope="col">Website</th>
                    <th width="17%" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($companies as $company)
                        <tr>
                       <?php echo Storage::url("logo/$company->logo") ?>
                            <th scope="row"><img src= '{{Storage::url("logo/{$company->logo}")}}' alt="" width="50" height="50"></th>
                            <td>{{$company->name}}</td>
                            <td width="25%">{{$company->address}}</td>
                            <td width="25%">{{$company->website}}</td>
                            <td style="display:flex">
                            <div>
                                <a href="/companies/{{$company->company_id}}" class="btn btn-secondary btn-sm">View</a>
                            <a href="/companies/edit/{{$company->company_id}}" class="btn btn-primary btn-sm">Edit</a>
                            </div>&nbsp;  
                            <div>
                                <form action="{{url('/companies/destroy/'.$company->company_id)}}" method="POST">
                                  {{method_field('DELETE')}}
                                  {{csrf_field()}}
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                              </form>
                            </div>
                            </td>
                          </tr>
                    @endforeach
                  </tbody>
              </table>
              <?php echo $companies->links(); ?>
        </div>
    </div>
</div>
@endsection
