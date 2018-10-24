<?php

use Illuminate\Database\Seeder;

class DeliveryMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delivery_methods')->delete();
        
        \DB::table('delivery_methods')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'pickup',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'post',
            ),
        ));
        
        
    }
}