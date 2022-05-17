<!DOCTYPE html>
<html>
<head>
   <title>List User</title>
   <meta charset="utf-8">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1>List User</h1>
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-3 text-danger">Xin chào admin {{Session::get('user_name')}}</div>
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
            <div class="row">
                <div class="col-lg-10"></div>
                <div class="col-lg-2">
                    <form id ="logout" action="{{route('logout')}}" method="get">
                        <button type="submit" class="btn btn-secondary btn-sm">Logout</button>
                    </form>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-2">
                <form id ="list-task-all" action="{{route('admin.all-task')}}" method="get">
                    <button type="submit" class="btn btn-success btn-sm">All Task</button>
                </form>
            </div>
            <div class="col-lg-2">
                <form id ="create" action="{{route('show.create-user')}}" method="get">
                    <button type="submit" class="btn btn-danger btn-sm">New User</button>
                </form>
            </div>
            <div class="col-lg-8"></div>
        </div>
        <br>
        <div>
            <form action="" method="get">
                <input type="text" name="search" placeholder="Search by name..." value="{{request()->search ?? ''}}">
                {{-- <input type="submit" value="Search"> --}}
                <button type="submit" class="btn btn-outline-success btn-sm">Search</button>
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