<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getAllUser();
    public function getListUserByCondition($request);
    public function getAllUserTask($request);
}
