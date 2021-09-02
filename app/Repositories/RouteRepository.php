<?php

namespace App\Repositories;

use App\Models\Route;
use App\Repositories\Interfaces\RouteRepositoryInterface;

class RouteRepository implements RouteRepositoryInterface
{
    public function all(){

        return Route::with('delivery')->get();

    }

    public function find($id){

        return Route::with('delivery')->where('id', $id)->first(); 

    }

}