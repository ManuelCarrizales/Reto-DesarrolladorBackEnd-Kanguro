<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }


    //Función encargada de crear un nuevo registro para envios
    public function createShipping(Request $request){

        //Generador de codigo de envio random
        $random = Str::random(20);


        //Creación del registro
        $shipping = Shipping::create([
            'user_id' => $request->get('user_id'),
            'origen' => $request->get('origen'),
            'destino' => $request->get('destino'),
            'tracking_code' => $random,
            'parcel_id' => $request->get('parcel_id'),
            'status_id' => $request->get('status_id'),
        ]);

        $shipping = $shipping->fresh();
        //Se retorna el registro elaborado
        return $this->sendResponse($shipping, 'Envio creado correctamente');
    }

    //Función que se encarga de traer el registro del envio mediante el codigo de envio
    public function getShippingByTrackingCode(Request $request){
        $shipping = Shipping::where('tracking_code', $request->get('code'))->first();
        return $this->sendResponse($shipping, 'Envio recuperado correctamente');
    }

    //Función para enviar una respuesta
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }
}
