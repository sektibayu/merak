<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\status;
use Input;
use Validator;
use Redirect;

class statusController extends Controller{
    public function index(){
        $data['status'] = Status::all();
        return view('status.index', $data);
    }

    public function create(){
        return view('status/create');
    }

    public function rules(){
        $rules = array(
            'desc' => 'required'
        );
        return $rules;
    }

    public function input($item)
    {
        $item->desc = Input::get('desc');
        return $item;
    }

    public function validcheck()
    {
        return Validator::make(Input::all(), $this->rules());
    }

    public function store(){
        if ($this->validcheck()->fails()) {
            // dd(Input::all());
            return Redirect::back()->withInput(Input::all());
        }
        else {
            $item = new Status();
            $this->input($item);
            $item->save();
            return Redirect::to('status');
        }
    }

    public function update($id, Request $request){
        if ($request->isMethod('get')) {
            $item['status'] = Status::find($id);
            return view('status/update', $item);
        }
        elseif ($request->isMethod('post')){
            if ($this->validcheck()->fails()){
                return Redirect::back()->withInput();
            }
            else{
                $item = Status::find($id);
                $this->input($item);
                $item->save();
                return Redirect::to('status');
            }
        }
    }

    public function delete($id){
        $item = Status::find($id);
        $item->delete();
        return redirect('status');
    }
}