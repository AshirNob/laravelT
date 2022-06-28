<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\View\Components\caddshop;



class shop extends Controller
{
    public function AddShop()
    {
        $createShopHtml = new caddshop();
        return $createShopHtml->render();
    }

    public function SubmitShop(Request $req)
    {
       $shop = new  \App\Models\Shop;
       $shop->name=$req->shopname;
       $shop->description=$req->shopdescription;
       $shop->status="1";
       $shop->save();
       return true;
    }
}
