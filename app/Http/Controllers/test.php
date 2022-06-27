<?php

namespace App\Http\Controllers;
use App\View\Components\home;
use Illuminate\Http\Request;

class test extends Controller
{
    public function LoadHome(){
      //  $html = view('components.home', ['x-variable' => $value]);
        $html = view('components.home');
        return $html; 
    }
    public function LoadTable(){
      $html = view('components.table');

     //  $html = new 
        return $html; 
    }
}
