<?php

namespace Database\Seeders;

use App\Models\Parcels;
use App\Models\ShippingStatus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creacion de usuarios de prueba
        for($i=0;$i<5;$i++){
        User::create([
            'name' => 'User ' . $i + 1,
            'email' => 'mail' . $i + 1 . '@outlook.com',
            'password' => Hash::make('mail'.$i.'@outlook.com')
            ]);
        }
        //Creacion de estatus de prueba
        ShippingStatus::create([
            'description' => 'Enviado',
        ]);
        ShippingStatus::create([
            'description' => 'En espera',
        ]);
        ShippingStatus::create([
            'description' => 'Entregado',
        ]);
        //Creacion de paqueterias de prueba
        Parcels::create([
            'name' => 'DHL',
        ]);
        Parcels::create([
            'name' => 'Estafeta',
        ]);
        Parcels::create([
            'name' => 'Fedex',
        ]);
        //
    }
}
