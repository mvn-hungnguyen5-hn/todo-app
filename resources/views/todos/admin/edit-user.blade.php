<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Edit User By Admin</title>
</head>
<body>
   
    <div class="container">
    <h1>Edit User By Admin</h1>
    <form action="{{route('admin.update-user', $user->id)}}" class="was-validated" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="uname">Name:</label>
          <input type="text" class="form-control" id="" placeholder="name" value="{{$user->name}}" name="name">
          @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="pwd">Email:</label>
          <input class="form-control" id="" placeholder="Email" name="email" value="{{$user->email}}">
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror

          <div class="form-group">
            <label for="pwd">Password:</label>
            <input class="form-control" id="" placeholder="Password" name="password" value="">
            @error('password')
              <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
          <label for="level">Type Account:</label>
          <select class="form-control" id="level" name="level">
            <option value="0" @if ($user->level == '0' )  selected  @endif>Base Account </option>
            <option value="1" @if ($user->level == '1' )  selected  @endif>Admin</option>
          </select>
          @error('level')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>  
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html>