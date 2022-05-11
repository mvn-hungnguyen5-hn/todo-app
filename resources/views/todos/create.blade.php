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
        <h1>Create</h1>
        <form action="{{ route('todos.store')}}" class="was-validated" method="POST">
            @csrf
            <div class="form-group">
              <label for="uname">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="name" name="name">
              @error('name')
                <div class="error">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="des">Description:</label>
              <input class="form-control" id="des" placeholder="Description" name="description">
              @error('description')
                <div class="error">{{ $message }}</div>
              @enderror
              
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
</body>
</html>