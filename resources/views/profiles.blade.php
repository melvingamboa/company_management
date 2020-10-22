@extends('layouts.app')
@section('json_api')
  <script src="{{ asset('js/json_api.js') }}"></script> 
@endsection
@section('content')
<div class="container">

<h1>Json List</h1>
<table class="table table-bordered" id="api_table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">UserID</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
    </tr>
  </thead>
  <tbody>
     
  </tbody>
</table>
</div>
@endsection

