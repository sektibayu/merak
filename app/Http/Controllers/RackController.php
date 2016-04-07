<?php

namespace App\Http\Controllers;

use App\Rack;
use Request;
use Illuminate\Support\Facades\Input;

class RackController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $share['items'] = Rack::get();
        return view('pages.rack.index', $share);
    }

    public function detail($id){
        $share['item'] = Rack::find($id);
        return view('pages.rack.detail', $share);
    }

    public function create()
    {
        if (Request::isMethod('get'))
        {
            return view('pages.rack.create');
        }
        else if (Request::isMethod('post'))
        {
            $rack = Rack::create(Input::all());
            return redirect('rack');
        }
    }

    public function update($id)
    {
        if(Request::isMethod('get'))
        {
            $share = array();
            $share['items'] =Rack::find($id);

            return view('pages.rack.update', $share);
        }
        else if(Request::isMethod('post'))
        {
            $rack = Rack::find($id);
            $rack->update(Input::all());
            $rack->save();

            return redirect('rack');
        }
    }

    public function delete($id)
    {
        $rack = Rack::find($id);

        $rack->delete();
        return redirect('rack');
    }
}
