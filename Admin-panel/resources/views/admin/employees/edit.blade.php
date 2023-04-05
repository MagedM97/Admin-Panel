<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ url('css/style.css') }}" rel="stylesheet" />
</head>
<body style="padding: 100px">
    
<h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Edit {{$employee['First Name']}}'s informarion </h1>
<form method="POST" action="{{ url('admin/employee/'.$employee['id']) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <label>First Name</label>
    <input class="form-control" name="first_name" value="{{ old('name',$employee['First Name']) }}" />
    @error('first_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label>First Name</label>
    <input class="form-control" name="last_name" value="{{ old('name',$employee['Last Name']) }}" />
    @error('last_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label>Email</label>
    <input class="form-control " name="email" value="{{ old('email',$employee->Email) }}">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label>Phone</label>
    <input class="form-control" name="phone" type="text" value="{{ old('website',$employee->Phone) }}"  />
    @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label>Company</label>
    <select class="form-control" name="company">
        
        @foreach ($companies as $company)
            <option value="{{ $company->id }}" {{ old('company') == $company['id'] ? 'selected' : '' }}>
                {{ $company->Name }}</option>
              
        @endforeach
        @error('company')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </select>
    <br>
    <button class="btn btn-primary">Edit</button>
    <a class="btn btn-secondary" href="{{ url('admin/employees') }}">Cancel</a>
</form>

</body>
</html>