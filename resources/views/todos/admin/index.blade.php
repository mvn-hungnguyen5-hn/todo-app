<!DOCTYPE html>
<html>
<head>
   <title>List User</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>List User</h1>
        <div>
            <form id ="logout" action="{{route('logout')}}" method="get">
                <button type="submit" class="btn btn-success">Logout</button>
            </form>
        </div>
        <br>
        <div>
            <form id ="list-task-all" action="{{route('admin.all-task')}}" method="get">
                <button type="submit" class="btn btn-info">All Task</button>
            </form>
        </div>
        <div>
            <form id ="create" action="{{route('show.create-user')}}" method="get">
                <button type="submit" class="btn btn-info">New User</button>
            </form>
        </div>
        <br>
        <div>
            <form action="" method="get">
                <input type="text" name="search" placeholder="Search..." value="{{request()->search ?? ''}}">
                <input type="submit" value="Search">
            </form>
        </div>
        <br>
        <table class="table table-striped">
            <tr>
                <th>@sortablelink('id')</th>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('email')</th>
                <th>Type account</th>
                <th>View Detail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($listUser as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->level == '1' ? 'Admin' : 'Base Account'}}</td>
                    <td><a href="{{route('admin.show-user', $user->id)}}">View</a></td>
                    <td><a href="{{route('show.edit-user', $user->id)}}">Edit</a></td>
                    <td>
                    <form id="form-delete" method="POST" action="{{route('admin.destoy-user', $user->id)}}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Delete</button>
                    </form>
                    </td>
                </tr>  
            @endforeach     
        </table>
        {!! $listUser->appends(\Request::except('page'))->render() !!}
    </div>
</body>
</html>