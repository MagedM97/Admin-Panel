@extends('admin.admin_dashboard')
@section('admin_panel_content')


<div>
  <h2 class="m-2" style="color: blue">Companies</h2>

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
  

  <a class="btn btn-success" href="{{url('admin/companies/create')}}" role="button" style="margin: -2em 0 2em 40%; width:300px" >Add Company</a>
<table class="table ml-2" style="width: 80vw">
  <thead>
    <tr>
      <th><h5>#Id</h5></th>
      <th><h5>Name</h5></th>
      <th><h5>Logo</h5></th>
      <th><h5>Email</h5></th>
      <th><h5>Website</h5></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($companies as $company)
    <tr>
      <td>{{$company['id']}}</td>
      <td>{{$company['Name']}}</td>
      <td><img src="{{asset('storage/'.$company['Logo'])}}" alt="" width="50"></td>
      <td>{{$company['Email']}}</td>
      <td><a href="{{$company['Website']}}" role="button">Link</a></td>
      
      <td   ><a  class="btn btn-primary" href="{{url('admin/company/'.$company['id'].'/edit')}}" role="button">EDIT</a></td> <td >
        <form action="{{ url('admin/companies/'. $company['id']) }}" method="POST">
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
  {!!$companies->links()!!}
</div>
@endsection