<?php

namespace App\Repositories\Interfaces;

interface RouteRepositoryInterface
{
    public function all();

    public function find($id);
    
}