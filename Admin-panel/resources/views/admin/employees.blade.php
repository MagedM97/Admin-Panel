@extends('admin.admin_dashboard')
@section('admin_panel_content')


<div >
  <h2 class="m-2" style="color: blue">Employees</h2>

  @if (session()->has('message'))
<div  class="alert alert-success mb-3" role="alert">
    {{ Session::get('message')}}
  </div>
  @endif
  @if (session()->has('alert'))
<div  class="alert alert-danger" role="alert">
    {{ Session::get('alert')}}
  </div>
  @endif
  <br>
  

  <a class="btn btn-success" href="{{url('admin/employees/create')}}" role="button" style="margin: -2em 0 2em 40%; width:300px" >Add  Employee</a>
<table class="table ml-2" style="width: 80vw">
  <thead>
    <tr>
      <th><h5>#Id</h5></th>
      <th><h5>First Name</h5></th>
      <th><h5>Last Name</h5></th>
      <th><h5>Email</h5></th>
      <th><h5>Company</h5></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($employees as $employee)
    <tr>
      <td>{{$employee['id']}}</td>
      <td>{{$employee['First Name']}}</td>
      <td>{{$employee['Last Name']}}</td>
      <td>{{$employee['Email']}}</td>
      <td>{{$employee['company']['Name']}}</td>
      <td   ><a  class="btn btn-primary" href="{{url('admin/employee/'.$employee['id'].'/edit')}}" role="button">Edit</a></td> <td >
        <form action="{{ url('admin/employees/'. $employee['id']) }}" method="POST">
            @method('DELETE')
            @csrf
            <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
        </form>
    </td>
    </tr>
  @endforeach

  </tbody>
</table>
<div style="margin: 0 45%">
  {!!$employees->links()!!}
</div>
@endsection