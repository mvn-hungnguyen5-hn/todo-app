<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail User</title>
</head>
<body>
    <h1>View user information</h1>
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block"> 
         <strong>{{ $message }}</strong>
        </div>
    @endif
    <p>Name: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>
</body>
</html>