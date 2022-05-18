<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;
use App\Jobs\SendEmail;
use App\Repositories\Interfaces\UserRepositoryInterface;

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
        return view('todos.admin.create-user');
    }
    public function processUserRegister(UserPostRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = bcrypt($request->input('password'));
        try {
            $user->save();
            //tạo Job gửi mail đưa vào queue, thời gian delay xử lí là 5 phút
            SendEmail::dispatch($user)->delay(now()->addMinute(5));
        } catch (\Exception $exeption) {
            return redirect()->route('admin.index')->with('error', 'Đăng kí tài khoản thất bại');
        }
        return redirect()->route('admin.index')->with('success', 'Đăng kí tài khoản và gửi mail thành công');
    }
    public function showEditUserForm($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('todos.admin.edit-user', compact('user'));
        } else {
            return redirect()->back()->with('error', 'User không tồn tại');
        }
    }
    public function update(UserPostRequest $request, $id)
    {
        try {
            $user = User::find($id);
            if($user){
               $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->level = $request->input('level');
            $user->password = bcrypt($request->input('password'));
            $user->save(); 
            }else{
                return redirect()->route('admin.index')->with('error', 'Chỉnh sửa tài khoản không tồn tại');
            }
            
        } catch (\Exception $exeption) {
            return redirect()->route('admin.index')->with('error', 'Chỉnh sửa tài khoản không thành công');
        }
        return redirect()->route('admin.index')->with('success', 'Edit tài khoản thành công');
    }
    public function destroy($id)
    {
        //xóa task user và xóa các user
        $todo = Todo::where('user_id', $id);
        Todo::where('user_id', $id)->delete();
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
            } else {
                return redirect()->route('admin.index')->with('error', 'Tài khoản không tồn tại');
            }
        } catch (\Exception $exeption) {
            return redirect()->route('admin.index')->with('error', 'Xóa tài khoản không thành công');
        }
        return redirect()->route('admin.index')->with('success', 'Xóa tài khoản thành công');;
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('todos.admin.show-user', compact('user'));
        } else {
            return redirect()->back()->with('error', 'User không tồn tại');
        }
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
        if (!$task) {
            return redirect()->back()->with('error', 'Task không tồn tại');
        }
        $task->delete();
        return redirect()->back()->with('success', 'Xóa task thành công');
    }
}
