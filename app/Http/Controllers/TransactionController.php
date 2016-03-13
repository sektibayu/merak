<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Requests;

class TransactionController extends Controller
{
    public function index(){
        $item = Transaction::find(1);
        dd($item);
    }
}
