<?php

namespace App\Http\Controllers;

use App\Item;
use Request;
use Illuminate\Support\Facades\Input;
use Excel;
use DB;

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
                $sheet->setWidth(array(
                    'B' => 4, 
                    'C' => 20,
                    'D' => 20,
                    'E' => 20,
                    'F' => 11,
                    'G' => 10
                    ));
                $rownum = 7 + $items->count();
                $sheet->setBorder('B7:G'.$rownum, 'thin');
                // $sheet->cells->setAlignment('center');

                $sheet->cells('B7:G'.$rownum, function($cells) {
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

    public function printbon()
    {
        $items = DB::table('transaction')
                    ->join('item', 'transaction.itemid', '=', 'item.itemid')
                    ->join('status', 'transaction.statusid', '=', 'status.statusid')
                    ->select('item.no_part', 'item.name', 'item.spec', 'transaction.tmp_stock','item.pieces', 'status.desc')
                    ->where('transaction.time', 'like', Input::get('waktu').'%')
                    ->where('transaction.inout','=',0)
                    ->get();

        Excel::create('DATAP_PERMINTAAN'.Input::get('waktu'), function($excel) use($items){
            $excel->setTitle('DATA PERMINTAAN')
                    ->setCompany('PT. BORNEO INDAH MARJAYA
                        ');
            $excel->sheet('DATA PERMINTAAN', function($sheet) use($items){
                $row = 11;


                // tanggal bpb
                $tanggalbpb = array(
                    array('PT. BORNEO INDAH MARJAYA',null,null,null,null,'No. BPB', ':'),
                    array('SITE',null,null,null,null,'Tgl. BPB',': '.Input::get('waktu')),
                    array('LOCATION',null,null,null,null,'No. SKB', ':')
                );

                $sheet->row(2,array(null,null,null,null,'PT. BORNEO INDAH MARJAYA',null,null,null,null,'No. BPB', ':'));
                $sheet->row(3,array(null,null,null,null,'SITE',null,null,null,null,'Tgl. BPB',': '.Input::get('waktu')));
                $sheet->row(4,array(null,null,null,null,'LOCATION',null,null,null,null,'No. SKB', ':'));

                $sheet->setBorder('J2:K4','thin');

                $sheet->cells('E2', function($cells) {
                    $cells->setFont(array(
                        'family' => 'Calibri',
                        'size' => 13,
                        'bold' => true
                    ));
                });

                //$sheet->fromArray($tanggalbpb,null,'E1', true);
                //end of tgl bpb

                                //tulisan bpb ditengah
                // $bpb = array(array('BON PERMINTAAN BARANG (BPB)'));
                $sheet->mergeCells('A6:K6');
                $sheet->cells('A6', function($cells) {
                    $cells->setAlignment('center');
                    $cells->setFont(array(
                        'family' => 'Calibri',
                        'size' => 14,
                        'bold' => true
                    ));
                });
                $sheet->row(6,array('BON PERMINTAAN BARANG (BPB)'));
                // $sheet->fromArray($bpb,null,'A6', true);
                //end of bpb

                $sheet->row(8, array(null,null,'Internal Costumer / pemohon :',null,null,null,null,'Expenses',null,'Project'));
                $sheet->row(9, array(null,null,'Invesment Code'));

                $sheet->mergeCells('C30:D30');
                $sheet->mergeCells('H30:I30');

                $sheet->mergeCells('C33:D33');
                $sheet->mergeCells('H33:I33');

                $sheet->mergeCells('C34:D34');
                $sheet->mergeCells('H34:I34');

                $sheet->row(30, array(null,null,'Di setujui',null, null, 'Diminta',null,'Diserahkan',null,null,'Diterima'));
                $sheet->row(33, array(null,null,'………………………..',null, null, '………………………..',null,'………………………..',null,null,'………………………..'));
                $sheet->row(34, array(null,null,'Manager',null, null, 'Asisten',null,'Kepala/krani Gudang',null,null,null));

                $sheet->cells('C30:K34', function($cells) {
                    $cells->setAlignment('center');
                });

                $sheet->setOrientation('landscape');

                $sheet->setWidth(array(
                    'A' => 5.28,
                    'B' => 3.15,
                    'C' => 5.42, 
                    'D' => 13.85,
                    'E' => 19.28,
                    'F' => 23.19,
                    'G' => 7.19,
                    'H' => 10.85,
                    'I' => 11.58,
                    'J' => 17.03,
                    'K' => 22.15
                ));
                //tabel utama
                $sheet->setBorder('C11:K26', 'thin');
                
                $sheet->cells('C11:K26', function($cells) {
                    $cells->setAlignment('center');
                });

                $sheet->row($row, array(
                    null,
                    null,
                    'No',
                    'Part No',
                    'Part Description',
                    'Type Description / Spec',
                    'Qty',
                    'U/m',
                    'Cost Center',
                    'Batch no (Nursey)',
                    'Notes'
                    ));


                $no = 1;
                foreach ($items as $data){
                    $sheet->row(++$row, array(
                        null,
                        null,
                        $no++,
                        $data->no_part,
                        $data->name,
                        $data->spec,
                        $data->tmp_stock,
                        $data->pieces,
                        null,
                        null,
                        $data->desc
                        ));
                }
            });
        })->export('xls');
        return redirect('ekstra');
    }
}
