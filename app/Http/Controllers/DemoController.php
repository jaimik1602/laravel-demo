<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemoController extends Controller
{
  public function demo()
  {
    // return 'this is controller';
    // return redirect(url('demo'));
    return view('demo');
  }

  public function getValue($data)
  {
    return $data;
  }

  public function redirectToBlade($data, $data1 = null)
  {
    //  return view('demo', ['value' => $data, 'value1' => $data1]);
    return view('demo', compact('data', 'data1'));
  }

  public function sendMail()
  {
    $data = [
      'title' => 'Mail from ItSolutionStuff.com',
      'body' => 'This is for testing email using smtp.'
  ];
    Mail::to('jaimik1602@gmail.com')->send(new TestMail($data));
    return 'mail sent';
  }
}
