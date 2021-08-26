<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';
    protected $fillable = ['user_id','origen','destino','tracking_code','parcel_id','status_id'];

    protected static function boot(){
        parent:: boot();


        //Se insertan los modelos de los id para agregarlos a la hora de hacer una get o inserción
        static:: retrieved(function($model){
            $model->user = $model->getUser();
            $model->parcels = $model->getParcels();
            $model->status = $model->getStatus();

        });
        static:: saving(function($model){
            unset($model->user);
            unset($model->parcels);
            unset($model->status);

        });
        static:: updating(function($model){
            unset($model->user);
            unset($model->parcels);
            unset($model->status);
        });
    }

    //Funciones que traen los modelos de datos de otras tablas

    public function getStatus(){
        return ShippingStatus::where("id", $this->status_id)->first();
    }

    public function getParcels(){
        return Parcels::where("id", $this->parcel_id)->first();
    }

    public function getUser(){
        return User::where("id", $this->user_id)->first();
    }
}
