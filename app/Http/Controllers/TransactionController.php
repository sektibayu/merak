<?php

namespace App\Http\Controllers;

use App\Transaction;
use Request;
use Illuminate\Support\Facades\Input;

class TransactionController extends Controller
{
    public function index(){
        $share['items'] = Transaction::get();
        return view('pages.transaction.index', $share);
    }

    public function detail($id){
        $share['item'] = Transaction::find($id);
        return view('pages.transaction.detail', $share);
    }

    public function create()
    {
        if (Request::isMethod('get'))
        {
            return view('pages.transaction.create');
        }
        else if (Request::isMethod('post'))
        {
            $transaction = Transaction::create(Input::all());
            return redirect('transaction');
        }
    }

    public function update($id)
    {
        if(Request::isMethod('get'))
        {
            $share = array();
            $share['items'] = Transaction::find($id);

            return view('pages.transaction.update', $share);
        }
        else if(Request::isMethod('post'))
        {
            $transaction = Transaction::find($id);
            $transaction->update(Input::all());
            $transaction->save();

            return redirect('transaction');
        }
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();
        return redirect('transaction');
    }
}
