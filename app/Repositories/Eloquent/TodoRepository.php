<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\TodoRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Todo;

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
        // $listTodo = Todo::where(function ($query) use ($searchCondition) {
        //     $query->where('name', 'like', '%' . $searchCondition . '%')
        //         ->orWhere('description', 'like', '%' . $searchCondition . '%');
        // });
        // if ($request->sort && $request->direction) {
        //     $listTodo = $listTodo->orderBy($request->sort, $request->direction);
        // };
        // $listTodo = $listTodo->paginate(5);
        $query = $this->model->select('todos.*');
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
