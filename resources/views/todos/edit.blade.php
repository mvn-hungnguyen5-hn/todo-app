<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Edit task</title>
</head>
<body>
   
    <div class="container">
    <h1>Edit task</h1>
    <form action="{{ route('todos.update', $todo->id)}}" class="was-validated" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" placeholder="name" value="{{$todo->name}}" name="name">
          @error('name')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <input class="form-control" id="" placeholder="Description" name="description" value="{{$todo->description}}">
          @error('description')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Completed:</label>
          <select class="form-control" id="completed" name="completed">
            <option value="0" @if ($todo->completed == '0' )  selected  @endif>Chưa hoàn thành </option>
            <option value="1" @if ($todo->level == '1' )  selected  @endif>Đã hoàn thành</option>
          </select>
          @error('completed')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>  
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html>