<?php

namespace App\Http\Controllers;

use App\Status;
use Request;
use Illuminate\Support\Facades\Input;

class StatusController extends Controller
{
    public function index(){
        $share['items'] = Status::get();
        return view('pages.status.index', $share);
    }

    public function detail($id){
        $share['item'] = Status::find($id);;
        return view('pages.status.detail', $share);
    }

    public function create()
    {
        if (Request::isMethod('get'))
        {
            return view('pages.status.create');
        }
        else if (Request::isMethod('post'))
        {
            $status = status::create(Input::all());
            return redirect('status');
        }
    }

    public function update($id)
    {
        if(Request::isMethod('get'))
        {
            $share = array();
            $share['items'] =Status::find($id);;

            return view('pages.status.update', $share);
        }
        else if(Request::isMethod('post'))
        {
            $status = Status::find($id);;
            $status->update(Input::all());
            $status->save();

            return redirect('status');
        }
    }

    public function delete($id)
    {
        $status = Status::find($id);;

        $status->delete();
        return redirect('status');
    }
}
