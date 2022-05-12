<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Exception;
class AdminUserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepository = $userRepositoryInterface;
    }

    public function index(Request $request)
    {
        $listUser = $this->userRepository->getListUserByCondition($request);
        return view('todos.admin.index', compact('listUser'));
    }
    public function showCreateUserForm()
    {
        return view ('todos.admin.create-user');
    }
    public function processUserRegister(UserPostRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('admin.index');
    }
    public function showEditUserForm($id)
    {
        $user = User::find($id);
        return view('todos.admin.edit-user', compact('user'));
    }
    public function update(UserPostRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->level = $request->input('level');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('admin.index');
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('todos.admin.show-user', compact('user'));
    }

    //'getAllTask'])->name('admin.all-task');
    public function getAllTask(Request $request)
    {
        $listUserTask = $this->userRepository->getAllUserTask($request);
        return view('todos.admin.all-task', compact('listUserTask'));
    }

    //destroy task by task id
    public function processDestroyUserTask($id = null)
    {     
        $task = Todo::find($id);
        if(!$task){
            return redirect()->back()->with('error', 'Task không tồn tại');
        }
        $task->delete();
        return redirect()->back()->with('success', 'Xóa task thành công');
    }
}

