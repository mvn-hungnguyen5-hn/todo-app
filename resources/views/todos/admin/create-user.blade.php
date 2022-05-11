<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Register User By Admin</title>
</head>
<body>

    <div class="container">
        <h1>Register User By Admin</h1>
        <form action="{{ route('admin.register') }}" class="was-validated" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Username:</label>
              <input type="text" class="form-control" id="name" value="{{ old('name') }}" placeholder="name" name="name">
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            <div class="form-group">
              <label for="password">Password:</label>
              <input class="form-control" id ="password" name="password">
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div> 
            <div class="form-group">
                <label for="level">Type Account:</label>
                <input class="form-control" id ="level" name="level" value="{{ old('level') }}">
                @error('level')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>           
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
</body>
</html>