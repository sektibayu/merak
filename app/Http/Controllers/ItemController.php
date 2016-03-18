<?php

namespace App\Http\Controllers;

use App\Item;
use App\Rack;
use Request;
use Illuminate\Support\Facades\Input;

class ItemController extends Controller
{
    public function index(){
        $share['items'] = Item::get();
        return view('pages.item.index', $share);
    }

    public function detail($id){
        $share['item'] = Item::find($id);;
        return view('pages.item.detail', $share);
    }

    public function create()
    {
        if (Request::isMethod('get'))
        {
            $item['item'] = Rack::all();
            return view('pages.item.create', $item);
        }
        else if (Request::isMethod('post'))
        {
            $item = Item::create(Input::all());
            return redirect('item');
        }
    }

    public function update($id)
    {
        if(Request::isMethod('get'))
        {
            $share = array();
            $share['items'] =Item::find($id);;

            return view('pages.item.update', $share);
        }
        else if(Request::isMethod('post'))
        {
            $item = Item::find($id);;
            $item->update(Input::all());
            $item->save();

            return redirect('item');
        }
    }

    public function delete($id)
    {
        $item = Item::find($id);;

        $item->delete();
        return redirect('item');
    }
}
