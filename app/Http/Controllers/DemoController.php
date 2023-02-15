<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
   public function demo(){

    // return 'this is controller';
    // return redirect(url('demo'));
    return view('demo');
   }

   public function getValue($data){
     return $data;
   }

   public function redirectToBlade($data, $data1 = null){
    //  return view('demo', ['value' => $data, 'value1' => $data1]);
    return view('demo', compact('data', 'data1'));
   }
}
