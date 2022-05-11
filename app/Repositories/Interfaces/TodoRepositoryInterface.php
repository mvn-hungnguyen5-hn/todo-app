<?php

namespace App\Repositories\Interfaces;

interface TodoRepositoryInterface
{
    public function getAllTodo();
    public function getListTodoByCondition($request);
}
