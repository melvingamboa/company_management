@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-borderless table-sm">
                <tr>
                    <td width="8%">Name:</td>
                <td>{{$employee->fullname}}</td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td>{{$employee->age}}</td>
                </tr>
                <tr>
                    <td>Company:</td>
                    <td>{{$company->name}}</td>
                </tr>
                <tr>
                    <td>Position:</td>
                <td>{{$employee->position}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{$employee->email}}</td>
                </tr>
                <tr>
                    <td>Phone #:</td>
                    <td>{{ $employee->phone ? $employee->phone : "N/A" }}</td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ URL::previous() }}" class="btn btn-info" role="button">Go Back</a>
                </div>
            </div>
    </div>
@endsection
