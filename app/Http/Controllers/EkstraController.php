<?php

namespace App\Http\Controllers;

use PHPExcel_Worksheet_Drawing;
use App\Item;
use Request;
use Illuminate\Support\Facades\Input;
use Excel;
use DB;

class EkstraController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
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

    public function tanggalbpb($sheet)
    {
        $rowbpb = 2;
        $sheet->row($rowbpb,array(null,null,null,null,'PT. BORNEO INDAH MARJAYA',null,null,null,null,'No. BPB', ':'));
        $sheet->row(($rowbpb+1),array(null,null,null,null,'SITE',null,null,null,null,'Tgl. BPB',': '.Input::get('waktu')));
        $sheet->row(($rowbpb+2),array(null,null,null,null,'LOCATION',null,null,null,null,'No. SKB', ':'));

        $sheet->setBorder('J'.$rowbpb.':K'.($rowbpb+2),'thin');

        $sheet->cells('E'.$rowbpb, function($cells) {
            $cells->setFont(array(
                'family' => 'Calibri',
                'size' => 13,
                'bold' => true
            ));
        });
    }

    public function title($sheet)
    {
        $titlerow = 6;
        $sheet->mergeCells('C'.$titlerow.':K'.$titlerow);
        $sheet->cells('C'.$titlerow, function($cells) {
            $cells->setAlignment('center');
            $cells->setFont(array(
                'family' => 'Calibri',
                'size' => 14,
                'bold' => true
            ));
        });
        // $sheet->row($titlerow,array(null,null,'BON PERMINTAAN BARANG (BPB)'));
        $sheet->setCellValue('C'.$titlerow, 'BON PERMINTAAN BARANG (BPB)');


        $sheet->row($titlerow+2, array(null,null,'Internal Costumer / pemohon :',null,null,null,null,'Expenses',null,'Project'));
        $sheet->row($titlerow+3, array(null,null,'Invesment Code'));
    }

    public function footer($sheet, $footerRow)
    {
        $sheet->mergeCells('C'.$footerRow.':D'.$footerRow);
        $sheet->mergeCells('H'.$footerRow.':I'.$footerRow);

        $sheet->mergeCells('C'.($footerRow+3).':D'.($footerRow+3));
        $sheet->mergeCells('H'.($footerRow+3).':I'.($footerRow+3));

        $sheet->mergeCells('C'.($footerRow+4).':D'.($footerRow+4));
        $sheet->mergeCells('H'.($footerRow+4).':I'.($footerRow+4));

        $sheet->cells('C'.$footerRow.':K'.($footerRow+4), function($cells) {
            $cells->setAlignment('center');
        });

        $sheet->row($footerRow, array(null,null,'Di setujui',null, null, 'Diminta',null,'Diserahkan',null,null,'Diterima'));
        $sheet->row(($footerRow+3), array(null,null,'………………………..',null, null, '………………………..',null,'………………………..',null,null,'………………………..'));
        $sheet->row(($footerRow+4), array(null,null,'Manager',null, null, 'Asisten',null,'Kepala/krani Gudang',null,null,null));

        
    }

    public function putCircle($cell, $x, $y, $sheet)
    {
        $objDrawing = new PHPExcel_Worksheet_Drawing;
        $objDrawing->setPath(public_path('images/circle.png'));
        $objDrawing->setCoordinates($cell);
        $objDrawing->setOffsetX($x);
        $objDrawing->setOffsetY($y);
        $objDrawing->setWorksheet($sheet);
    }

    public function header($sheet)
    {

        $objDrawing = new PHPExcel_Worksheet_Drawing;
        $objDrawing->setPath(public_path('images/logo.png'));
        $objDrawing->setCoordinates('D2');
        $objDrawing->setWorksheet($sheet);

        $this->putCircle('I8', 60, 1, $sheet);
        $this->putCircle('G8', 30, 1, $sheet);

        $this->tanggalbpb($sheet);

        $this->title($sheet);
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

        Excel::create('DATA_PERMINTAAN_'.Input::get('waktu'), function($excel) use($items){
            $excel->setTitle('DATA PERMINTAAN')
                    ->setCompany('PT. BORNEO INDAH MARJAYA
                        ');
            $excel->sheet('DATA PERMINTAAN', function($sheet) use($items){
                $row = 11;

                /*
                Every page is 38 rows,
                header start from 2,
                main table start 11,
                footer start from 30,

                */

                $sheet->setOrientation('landscape');

                $this->header($sheet);

                $sheet->setWidth(array(
                    'A' => 2 , 'B' => 2, 'C' => 5.42, 'D' => 13.85,
                    'E' => 19.28, 'F' => 23.19, 'G' => 7.19, 'H' => 10.85,
                    'I' => 11.58, 'J' => 17.03, 'K' => 30
                ));
                //tabel utama
                // var_dump($items);
                $result = count($items);
                $sheet->setBorder('C'.$row.':K'.($result+$row), 'thin');
                
                $sheet->cells('C'.$row.':K'.($result+$row), function($cells) {
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

                $this->footer($sheet, ($row+4));

            });
        })->export('xls');
        return redirect('ekstra');
    }
}
