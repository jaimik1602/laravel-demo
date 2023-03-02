<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
     public function set(){
        session()->put('key', 1);
     }

     public function get(){
        dd(session('key'));
     }

     public function forget(){
        session()->pull('key');
     }
}
