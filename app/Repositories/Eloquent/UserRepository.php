<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function getAllUser()
    {
        return $this->model->all();
    }

    //get list user and paging
    public function getListUserByCondition($request)
    {
        $searchCondition = $request->input('search');
        $query = $this->model->select('users.*');
        if($request->search) {
            $query->where('id', 'like', '%' . $searchCondition . '%')
                ->orwhere('name', 'like', '%' . $searchCondition . '%')
                ->orWhere('email', 'like', '%' . $searchCondition . '%');
        }
        if($request->sort && $request->direction) {
            $query->orderBy($request->sort, $request->direction);
        }
        return $query->paginate(5);
    }

    //get all task of all user
    public function getAllUserTask($request)
    {
        $searchCondition = $request->input('search');

        $query = DB::table('users')
        ->join('todos','users.id', '=', 'todos.user_id')
        ->select('users.id as id_user' ,'users.name as user_name', 'todos.id as id_task', 'todos.name as task_name');
        if($request->search){
            $query->where('users.name', 'like', '%' . $searchCondition . '%')
            ->orWhere('todos.name', 'like', '%' . $searchCondition . '%');
        }
        $query->orderBy('id_user', 'ASC');
        return $query->paginate(5);
    }
}
