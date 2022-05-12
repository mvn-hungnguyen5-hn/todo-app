<!DOCTYPE html>
<html>
<head>
   <title>List task of user</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block"> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block"> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <h1>List task of user</h1>
        <div>
            <form id ="logout" action="{{route('logout')}}" method="get">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
        <br>
        <div>
            <form action="" method="get">
                <input type="text" name="search" placeholder="Search..." value="{{request()->search ?? ' '}}">
                <input type="submit" value="Search">
            </form>
        </div>
        <br>
        <table class="table table-striped">
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Task ID</th>
                <th>Task Name</th>   
                <th>Delete task</th>
            </tr>
            @foreach ($listUserTask as $user)
                <tr>
                    <td>{{$user->id_user}}</td>
                    <td>{{$user->user_name}}</td>
                    <td>{{$user->id_task}}</td>
                    <td>{{$user->task_name}}</td>
                    <td>
                    <form id="form-delete" method="POST" action="{{route('admin.destoy-task', $user->id_task ?? '')}}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Delete</button>
                    </form>
                    </td>
                </tr>  
            @endforeach     
        </table>
        {!! $listUserTask->appends(\Request::except('page'))->render() !!}
    </div>
</body>
</html>