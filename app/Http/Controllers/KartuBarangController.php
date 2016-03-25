<?php

namespace App\Http\Controllers;

use App\Item;
use App\Rack;
use App\Transaction;
use App\Status;

use Request;
use DB;

use Illuminate\Support\Facades\Input;

class KartuBarangController extends Controller
{
     public function index(){
        $share['items'] = Item::get();
        return view('pages.kartuBarang.index', $share);
    }

    public function detail(Request $request,$id){
        $share['transactions'] = DB::table('Transaction')->where('itemid','=',$id)->get();
        if(Request::isMethod('get')){
            $share['item'] = Item::find($id);
            return view('pages.kartuBarang.detail', $share);
        }else if(Request::isMethod('post')){
            $share['transaction'] = Transaction::create([
                'time'=>request::input('waktu'),
                'itemid'=>$id,
                'inout'=>request::input('plusminus'),
                'tmp_stock'=>request::input('jumlah')
                ]);
            if(request::input('plusminus')=='1'){
                $share['item'] = Item::find($id);
                $share['item']->price = ((( $share['item']->price * $share['item']->stock ) + (request::input('harga_baru') * request::input('jumlah')))/($share['item']->stock + request::input('jumlah')));
                $share['item']->stock = $share['item']->stock + request::input('jumlah');
                $share['item']->save();
                return redirect()->back();
                // return view('pages.kartuBarang.detail',$share);
            }elseif(request::input('plusminus')=='0') {
                $share['item'] = Item::find($id);
                $share['item']->stock = $share['item']->stock - request::input('jumlah');
                $share['item']->save();
                return redirect()->back();
                // return view('pages.kartuBarang.detail',$share);
            }
        }
    }

    public function create()
    {
        if (Request::isMethod('get'))
        {
            $item['item'] = Rack::all();
            return view('pages.kartuBarang.create', $item);
        }
        else if (Request::isMethod('post'))
        {
            $item = Item::create(Input::all());
            return redirect('kartubarang');
        }
    }

    public function update($id)
    {
        if(Request::isMethod('get'))
        {
            $share = array();
            $share['items'] =Item::find($id);;
            $item['item'] = Rack::all();
            return view('pages.kartuBarang.update', $share, $item);
        }
        else if(Request::isMethod('post'))
        {
            $item = Item::find($id);
            $item->update(Input::all());
            $item->save();

            return redirect('kartubarang');
        }
    }

    public function delete($id)
    {
        $item = Item::find($id);;

        $item->delete();
        return redirect('kartubarang');
    }
}
