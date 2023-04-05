<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ url('css/style.css') }}" rel="stylesheet" />
</head>
<body style="padding: 100px">
<h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Add Employee</h1>
<form method="POST" action="{{url('admin/employees')}}" enctype="multipart/form-data">
    @csrf
    <label>First Name</label>
    <input class="form-control" name="first_name" value="{{ old('first_name') }}"/>
    @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label>Last Name</label>
    <input class="form-control" name="last_name" value="{{ old('last_name') }}"/>
    @error('last_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label>Email</label>
    <input class="form-control" name="email" value="{{ old('email') }}"/>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
    <br>
    <label>Phone</label>
    <input class="form-control" name="phone" value="{{ old('phone') }}"/>
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
    <label>Company</label>
    <select class="form-control" name="company">
        
        @foreach ($companies as $company)
            <option value="{{ $company->id }}">
                {{ $company->Name }}</option>
        @endforeach
    </select>
    <br>
    <button class="btn btn-primary">Add</button>
    <a class="btn btn-secondary" href="{{ url('admin/employees') }}">Cancel</a>
</form>
</body>
</html>