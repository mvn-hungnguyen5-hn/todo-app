<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="{{route('login')}}">
            @csrf
          <div class="form-group">
            <label>Username </label>
            <input type="text" name="name" class="form-control">
            @error('name')
               <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Password </label>
            <input type="password" name="password" class="form-control" >
            @error('password')
               <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        
          <div class="text-center" style="width: 100px">
            <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
          </div>
        
          <p class="sign-up">Don't have an Account?<a href="{{route('show.register')}}"> Sign Up</a></p>
        </form>
    </div>
</body>
</html>
