<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" /> --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/main.js') }}"></script>
    <style>
      .btn-login {
          font-size: 0.9rem;
          letter-spacing: 0.05rem;
          padding: 0.75rem 1rem;
        }

        .btn-google {
          color: white !important;
          background-color: #ea4335;
}
    </style>
    <title>Login</title>
</head>
<body>
  {{-- <h1>{{dd(Auth::check())}}</h1> --}}
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form method="post" action="{{route('login')}}">
                @csrf
                <div class="divider d-flex align-items-center my-4">
                  <h2 class="text-center fw-bold mx-3 mb-0">Sign in with account</h2>
                </div>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block"> 
                     <strong>{{ $message }}</strong>
                    </div>
                    @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
      
                <!-- user name input -->
                <div class="form-outline mb-4">
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <input type="text" id="name" name ="name" class="form-control form-control-lg"
                    placeholder="Enter a valid username" value="{{old('name')}}"/>
                  <label class="form-label" for="name">Username</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3 togger">
                  @error('password')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                  <input type="password" id="password" name = "password" class="form-control form-control-lg"
                    placeholder="Enter password" />
                  </button>
                  <label class="form-label" for="password">Password</label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-login btn-primary fw-bold"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign in</button>
                  <a href="{{route('api.google.login')}}" class="btn btn-google btn-login fw-bold"><i class="fa fa-google"></i>Sign in with Google</a>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{route('show.register')}}"
                      class="link-danger">Register</a></p>
                </div>
      
              </form>
            </div>
          </div>
        </div>
      </section>
</body>
</html>