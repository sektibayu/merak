<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = new Status;
        // $data->desc = 'FRUIT RECEPTION';
        // $data->save();
    	DB::table('status')->delete();
    	$supplier = array(
            '-',
	        'FRUIT RECEPTION', 
	        'STERILIZER',
	        'THRESER',  
	        'PRESS & DIGESTER', 
	        'CLARIFICATION', 
	        'NUT & KERNEL', 
	        'BOILER HOUSE', 
	        'WATER TREATMENT PLANT', 
	        'EFFLUENT TREATMENT PLANT', 
	        'LABORATORY', 
	        'WORKSHOP', 
	        'GENERAL (LAIN-LAIN)', 
	        'EMPTY BUNCH TREATMENT', 
	        'KOMPOSTING'
	    );

        for ($i=0; $i < 15; $i++) { 
        	$data = new Status;
        	$data->desc = $supplier[$i];
        	$data->save();
        	// DB::table('status')->insert([
        	// 	'desc' => $supplier[$i]
        	// ]);
        }

    }
}
