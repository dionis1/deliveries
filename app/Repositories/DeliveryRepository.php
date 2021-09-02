<?php

namespace App\Repositories;

use App\Models\Delivery;
use App\Repositories\Interfaces\DeliveryRepositoryInterface;

class DeliveryRepository implements DeliveryRepositoryInterface
{
    public function all()
    {
        return Delivery::with('route')->get();
    }

    public function find($id)
    {
        return Delivery::with('route')->where('id', $id)->first(); 
    }

    public function create($data)
    {
        return Delivery::create([
            'title' => $data->title,
            'date' => $data->date,
        ]); 
    }

    public function update($id, $data)
    {
        $delivery = Delivery::with('route')->findorfail($id);
        $delivery->title = $data->title;
        $delivery->date = $data->date;
        $delivery->save();

        return $delivery;
    }

    public function delete($id)
    {
        $delivery = Delivery::findorfail($id);
        $delivery->route()->sync([]);
        $delivery->delete();

        return $delivery;
    }

   
}