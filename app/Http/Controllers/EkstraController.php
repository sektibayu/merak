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
    }
}
