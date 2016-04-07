<?php

namespace App\Http\Controllers;

use App\Status;
use App\Transaction;
use App\Item;
use Request;
use Illuminate\Support\Facades\Input;

use DB;

class RegistrasiBarangController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function index(){
        $share['items'] = DB::Table('Transaction')->join('Item','Transaction.itemid','=','Item.itemid')->join('Status','Transaction.statusid','=','Status.statusid')->where('inout','=','0')->get();
        return view('pages.registrasiBarang.index', $share);
    }
}
