<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Models\Route;
use App\Repositories\Interfaces\DeliveryRepositoryInterface;
use App\Repositories\Interfaces\DeliveryServiceRepositoryInterface;

class DeliveryController extends Controller
{
    private $deliveryRepository;
    private $deliveryServiceRepository;

    public function __construct(DeliveryRepositoryInterface $deliveryRepository, DeliveryServiceRepositoryInterface $deliveryServiceRepository)
    {
        $this->deliveryRepository = $deliveryRepository;
        $this->deliveryServiceRepository = $deliveryServiceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $deliveries = $this->deliveryRepository->all();

        return response()->json($deliveries, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\DeliveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliveryRequest $request)
    {

        $delivery = $this->deliveryRepository->create($request);

        if(isset($request->deliveries) 
        && isset($request->route_id)
         ){
            $route = $this->deliveryServiceRepository->attachDeliveryToRoute($request->route_id, $request->deliveries, $delivery->id);
        }

        return response()->json($delivery, 200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $delivery = $this->deliveryRepository->find($id);

        return response()->json($delivery, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\DeliveryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeliveryRequest $request, $id)
    {

        if(isset($request->deliveries) 
        && isset($request->route_id)
         ){
            $route = $this->deliveryServiceRepository->attachDeliveryToRoute($request->route_id, $request->deliveries);
        }
        
        $delivery = $this->deliveryRepository->update($id, $request);

        return response()->json($delivery, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->deliveryRepository->delete($id);

        return response()->json('Deleted', 200);
    }
}
