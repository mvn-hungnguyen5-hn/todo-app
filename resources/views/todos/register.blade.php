<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Register User</title>
</head>
<body>

    <div class="container">
        <h1>Register User</h1>
        <form action="{{ route('register') }}" class="was-validated" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Username:</label>
              <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{old('name')}}">
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
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
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>
          </form>
        </div>
</body>
</html>