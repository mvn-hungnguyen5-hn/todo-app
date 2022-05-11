<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\User;

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
}
