<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\View\Components\caddshop;
use App\View\Components\cviewshop;
use App\View\Components\cforlfields;
use App\Models\formfield;
use App\Models\shopfield;
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
        $shop->name = $req->shopname;
        $shop->description = $req->shopdescription;
        $shop->status = "1";
        $shop->save();
        return true;
    }

    public function ViewAllShop()
    {
        $shops = new cviewshop(\App\Models\Shop::all());
        return $shops->render();
    }


    public function ShopFields($id)
    {
        $mainArr = array();
        $shopName= \App\Models\Shop::find($id)->value('name');
        $shopFields=shopfield::where('fk_shop',$id)->get();
        foreach($shopFields as $field) { 
               
            $arr=array(
                "label"=>$field->label, 
                "name"=>$field->name, 
                "type"=>formfield::where('id',$field->fk_form_fields)->value('type')
            );

            array_push($mainArr,$arr);
          
         }
         $allFields=formfield::all();
         $page=new cforlfields($mainArr,$shopName,$allFields,$id);
         return $page->render();
 


    }
}
