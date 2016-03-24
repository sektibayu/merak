<?php

namespace App\Http\Controllers;

use App\Status;
use App\Transaction;
use Request;
use Illuminate\Support\Facades\Input;

class RegistrasiBarangController extends Controller
{
    public function index(){
        $share['items'] = Transaction::get();
        return view('pages.registrasiBarang.index', $share);
    }
}
