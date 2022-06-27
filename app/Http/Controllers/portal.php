<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
class portal extends Controller
{
        public function main(Request $req){
    
        return view('master',['menus'=>menu::all()]);
        }
}
