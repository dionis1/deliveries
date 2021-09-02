<?php

namespace App\Repositories\Interfaces;

interface DeliveryServiceRepositoryInterface
{
    public function attachDeliveryToRoute($routeId, $deliveries);
}