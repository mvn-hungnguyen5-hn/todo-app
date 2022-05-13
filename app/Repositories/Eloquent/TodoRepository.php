<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\TodoRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoRepository extends BaseRepository implements TodoRepositoryInterface
{

    protected $model;

    public function __construct(Todo $model)
    {
        $this->model = $model;
    }
    public function getAllTodo()
    {
        return $this->model->all();
    }

    public function getListTodoByCondition($request)
    {
        $searchCondition = $request->input('search');
        $query = $this->model->select('todos.*');
        $query->where('user_id', Auth::user()->id);
        if($request->search) {
            $query->where('name', 'like', '%' . $searchCondition . '%')
                ->orWhere('description', 'like', '%' . $searchCondition . '%');
        }
        if($request->sort && $request->direction) {
            $query->orderBy($request->sort, $request->direction);
        }
        return $query->paginate(5);
    }
}
