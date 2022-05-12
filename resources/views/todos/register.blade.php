{{-- <!DOCTYPE html>
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
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Register User</title>
</head>
<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
  
                  <form class="mx-1 mx-md-4" action="{{ route('register') }}" method="POST">
                    @csrf
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="name" name= "name" class="form-control" value="{{old('name')}}"/>
                        <label class="form-label" for="name">Your Name</label>
                        @error('name')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="email" name ="email" class="form-control" value="{{old('email')}}"/>
                        <label class="form-label" for="email">Your Email</label>
                        @error('email')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="password" name ="password"class="form-control"  value="{{old('password')}}"/>
                        <label class="form-label" for="password">Password</label>
                        @error('password')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
  
                    {{-- <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="repassword" class="form-control" />
                        <label class="form-label" for="repassword">Repeat your password</label>
                      </div>
                    </div> --}}
  
                    <div class="form-check d-flex justify-content-center mb-5">
                      <p>Have already an account?<a href="{{ route('login') }}">Login here</a></p>
                    </div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>
  
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                    class="img-fluid" alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>