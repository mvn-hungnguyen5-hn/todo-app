<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Edit</title>
</head>
<body>
   
<div class="container">
    <h1>Edit</h1>
    <form action="{{ route('todos.update', $todo->id)}}" class="was-validated" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="uname">Name:</label>
          <input type="text" class="form-control" id="" placeholder="name" value="{{$todo->name}}" name="name">
          @error('name')
            <div class="error">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="pwd">Description:</label>
          <input class="form-control" id="" placeholder="Description" name="description" value="{{$todo->description}}">
          @error('description')
            <div class="error">{{ $message }}</div>
          @enderror
          
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html>