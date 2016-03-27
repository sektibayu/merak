<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Status;
use App\Transaction;
use Illuminate\Support\Facades\Input;

class PORMController extends Controller
{
    public function index(){

        if( Input::get('bulan') == null || Input::get('tahun') == null ){
            $bulan = date('m');
            $tahun = date('Y');
        } else {
            $bulan = Input::get('bulan');
            $tahun = Input::get('tahun');
        }

        $list=array();

        for($d=1; $d<=31; $d++)
        {
            $time=mktime(12, 0, 0, $bulan, $d, $tahun);
            if (date('m', $time)==$bulan)
                $list[]=date('d', $time);
        }

        $items = Transaction::whereMonth('time', '=', $bulan)->whereYear('time', '=', $tahun)->get();
        $status = Status::get();
        $indeks = array();
        $thisIs = array(array());
        foreach($status as $stat){
            $indeks[$stat->statusid] = $stat->desc;
        }
//        dd($indeks);
        foreach($status as $stat){
            foreach($list as $lis){
                $thisIs[$stat->statusid][+$lis] = 0;
            }
        }

        foreach($items as $item){
            $thisIs[$item->statusid][+substr($item->time,8,2)] += $item->count;
        }

        $subTotal = array();
        $total = array();
        $tot1 = 0; $tot2 = 0;
        foreach($list as $lis){
            $sum = 0;
            foreach($status as $stat) {
                if($stat->statusid != 14){
                    $sum += $thisIs[$stat->statusid][+$lis];
                }
            }
            $subTotal[+$lis] = $sum;
            $total[+$lis] = $sum + $thisIs[14][+$lis];
            $tot1 += $subTotal[+$lis];
            $tot2 += $total[+$lis];
        }
        $sideTotal = array();
        foreach($status as $stat){
            $sum = 0;
            foreach( $list as $lis ) {
                $sum += $thisIs[$stat->statusid][+$lis];
            }
            $sideTotal[$stat->statusid] = $sum;
        }

        $share['items'] = $thisIs;
        $share['subtotal'] = $subTotal;
        $share['total'] = $total;
        $share['sidetotal'] = $sideTotal;
        $share['bulan'] = $bulan;
        $share['tahun'] = $tahun;
        $share['indeks'] = $indeks;
        $share['list'] = $list;
        $share['tot1'] = $tot1;
        $share['tot2'] = $tot2;
//        dd($subTotal);
        return view('pages.porm.index', $share);

    }
}
