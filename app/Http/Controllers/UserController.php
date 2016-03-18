<?php

namespace App\Http\Controllers;

use App\User;
use Request;
use Illuminate\Support\Facades\Input;

class userController extends Controller
{
    public function index(){
        $share['items'] = User::get();
        return view('pages.user.index', $share);
    }

    public function detail($id){
        $share['item'] = User::find($id);
        return view('pages.user.detail', $share);
    }

    public function create()
    {
        if (Request::isMethod('get'))
        {
            return view('pages.user.create');
        }
        else if (Request::isMethod('post'))
        {
            $user = user::create(Input::all());
            $user->password = md5(md5(Input::get('password')));
            $user->save();
            return redirect('user');
        }
    }

    public function update($id)
    {
        if(Request::isMethod('get'))
        {
            $share = array();
            $share['items'] = User::find($id);

            return view('pages.user.update', $share);
        }
        else if(Request::isMethod('post'))
        {
            $user = User::find($id);
            $user->update(Input::all());
            $user->password = md5(md5(Input::get('password')));
            $user->save();

            return redirect('user');
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user');
    }
}
