<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Input;
use Validator;
use Redirect;

class UserController extends Controller{
    public function index(){
        $data['user'] = User::all();
        return view('user.index', $data);
    }

    public function create(){
        return view('user/create');
    }

    public function rules(){
        $rules = array(
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        );
        return $rules;
    }

    public function input($item)
    {
        $item->name = Input::get('name');
        $item->username = Input::get('username');
        $item->password = Input::get('password');
        return $item;
    }

    public function validcheck()
    {
        return Validator::make(Input::all(), $this->rules());
    }

    public function store(){
        if ($this->validcheck()->fails()) {
            // return Redirect::to('user/create')->withInput(Input::except('password'));
            return Redirect::back()->withInput(Input::all());
        }
        else {
            $item = new User();
            $this->input($item);
            $item->save();
            return Redirect::to('user');
        }
    }

    public function update($id, Request $request){
        if ($request->isMethod('get')) {
            $item['user'] = User::find($id);
            return view('user/update', $item);
        }
        elseif ($request->isMethod('post')){
            if ($this->validcheck()->fails()){
                return Redirect::back()->withInput();
            }
            else{
                $item = User::find($id);
                $this->input($item);
                $item->save();
                return Redirect::to('user');
            }
        }
    }

    public function delete($id){
        $item = User::find($id);
        $item->delete();
        return redirect('user');
    }
}