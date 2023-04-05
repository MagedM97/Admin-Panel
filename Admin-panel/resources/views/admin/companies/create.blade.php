<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ url('css/style.css') }}" rel="stylesheet" />
</head>
<body style="padding: 100px">
<h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Add Company</h1>
<form method="POST" action="{{url('admin/companies')}}" enctype="multipart/form-data">
    @csrf
    <label>Name</label>
    <input class="form-control" name="name" value="{{ old('name') }}"/>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label>Email</label>
    <input class="form-control" name="email" value="{{ old('email') }}"/>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
    <br>
    <label>Logo</label>
    <br>
    <input type="file" name="logo">
    @error('logo')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
    <br>
    <label>Website</label>
    <input type="text" class="form-control" name="website" value="{{ old('website') }}"/>
    @error('website')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
    <br>
    <button class="btn btn-primary">Add</button>
    <a class="btn btn-secondary" href="{{ url('admin/companies') }}">Cancel</a>
</form>
</body>
</html>