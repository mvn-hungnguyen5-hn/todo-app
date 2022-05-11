<!DOCTYPE html>
<html>
<head>
   <title>List Task</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>List task</h1>
        <div>
            <form id ="logout" action="{{route('logout')}}" method="get">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
        <br>
        <div>
            <form id ="create" action="{{route('todos.create')}}" method="get">
                <button type="submit" class="btn btn-info">Create</button>
            </form>
        </div>
        <br>
        <div>
            <form action="" method="get">
                <input type="text" name="search" placeholder="Search...">
                <input type="submit" value="Search">
            </form>
        </div>
        <br>
        <table class="table table-striped">
            <tr>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('description')</th>
                <th>View Detail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($listTodo as $task)
                <tr>
                    <td>{{$task->name}}</td>
                    <td>{{$task->description}}</td>
                    <td><a href="/todos/{{$task->id}}">View</a></td>
                    <td><a href="/todos/{{$task->id}}/edit">Edit</a></td>
                    <td>
                    <form id="form-delete" method="POST" action="{{route('todos.destroy', $task->id)}}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Delete</button>
                    </form>
                    </td>
                </tr>  
            @endforeach     
        </table>
        {{-- {{ $listTodo->links() }} --}}
        {!! $listTodo->appends(\Request::except('page'))->render() !!}
    </div>
</body>
</html>