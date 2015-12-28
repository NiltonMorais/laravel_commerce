<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getLogin()
    {
        $data = [
            'email' => 'nilton@schoolofnet.com',
            'password' => 123456
        ];

        Auth::attempt($data);

        /*if(Auth::attempt($data)){
            return "logou";
        }*/
       /* if(Auth::check()){
            return "Logado";
        }*/

        dd(Auth::user()->name);

        return "Falhou";
    }

    public function getLogout()
    {
        Auth::logout();

        if(Auth::check()){
            return "Logado";
        }

        return "Não está logado";
    }
}
