<?php

namespace App\Repositories;

use App\Models\Route;
use App\Repositories\Interfaces\DeliveryServiceRepositoryInterface;

class DeliveryServiceRepository implements DeliveryServiceRepositoryInterface
{
    public function attachDeliveryToRoute($routeId, $deliveries, $deliveryId = null)
    {
        $route = Route::findorfail($routeId);
        $route->delivery()->sync([]);

        foreach($deliveries as $delivery){

            if( ($deliveryId != "null") && ($delivery['id'] == "null") )
            {
                $route->delivery()->attach([ (int)$deliveryId ], ['position' => (int)$delivery['position']]);
            }else
            {
                $route->delivery()->attach([ (int)$delivery['id'] ], ['position' => (int)$delivery['position']]);
            }  

        }
      return $route;
    }

}