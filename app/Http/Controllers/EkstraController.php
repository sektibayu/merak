<?php

namespace App\Http\Controllers;

use App\Item;
use Request;
use Illuminate\Support\Facades\Input;
use Excel;

class EkstraController extends Controller
{
    public function index()
    {
    	return view('pages.ekstra.index');
    }

    public function exportLaravel()
    {
    	//nobarang, nama, spel, saldo, um
    	$items = Item::select('no_part','name','spec','stock', 'pieces')->get();
    	Excel::create('items', function($excel) use($items){
    		$excel->setTitle('DATA SELURUH ITEM');
    		$excel->sheet('DATA ITEM', function($sheet) use($items){
    			$row = 7;
<<<<<<< HEAD
                $sheet->setWidth(array(
                    'B' => 4, 
                    'C' => 20,
                    'D' => 20,
                    'E' => 20,
                    'F' => 11,
                    'G' => 10
                    ));

                $sheet->setBorder('B7:G10', 'thin');
                // $sheet->cells->setAlignment('center');

                $sheet->cells('B:G', function($cells) {
                    $cells->setAlignment('center');
                });

                $sheet->row($row, array(
                    null,
                    'NO',
                    'NOMOR BARANG',
                    'NAMA',
                    'SPEK',
                    'SALDO',
                    'UM'
                    ));


                $no = 1;
                foreach ($items as $data){
                    $sheet->row(++$row, array(
                        null,
                        $no++,
                        $data->no_part,
                        $data->name,
                        $data->spec,
                        $data->stock,
                        $data->pieces
                        ));
                }
            });
})->export('xls');
}

public function printbon($tgl){
        //part no, part description, type/spec, qty, um, notes
        /*

        select i.no_part, i.name, i.spec, t.tmp_stock, s.desc
        from transaction t, item i, status s
        where time = $time and t.itemid = i.itemid s.statusid = t.statusid;
        */
        // $items = Transaction::select('
        //     select i.no_part, i.name, i.spec, t.tmp_stock, s.desc
        //     from transaction t, item i, status s
        //     where time = $time and t.itemid = i.itemid s.statusid = t.statusid
        //     ')->;
=======
    			//$sheet->fromArray($items);
    			$sheet->row($row, array(
    				'NO',
    				'NOMOR BARANG',
    				'NAMA',
    				'SPEK',
    				'SALDO',
    				'UM'
    			));
    			$no = 1;
    			foreach ($items as $data){
    				$sheet->row(++$row, array(
    					$no++,
    					$data->no_part,
    					$data->name,
    					$data->spec,
    					$data->stock,
    					$data->pieces
    				));
    			}
    		});
    	})->export('xls');
>>>>>>> b2398432b63cda2277c38f9359aa80f08e9474db
    }
}
