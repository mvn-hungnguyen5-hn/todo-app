<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    protected $model;
    
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function getAll()
    {
        return $this->model->all();
    }

}