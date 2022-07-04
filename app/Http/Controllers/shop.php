<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\View\Components\caddshop;
use App\View\Components\cviewshop;
use App\View\Components\cforlfields;
use App\View\Components\cviewshopfielddata;
use App\Models\formfield;
use App\Models\shop as ModelsShop;
use App\Models\shopfield;
use App\Models\shopfielddata;
use App\Models\vwGetShopField;
use Illuminate\Support\Facades\DB;

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
        $shopName = \App\Models\Shop::find($id)->value('name');
        $shopFields = shopfield::where('fk_shop', $id)->get();
        foreach ($shopFields as $field) {

            $arr = array(
                "ffId" => $field->id,
                "label" => $field->label,
                "name" => $field->name,
                "type" => formfield::where('id', $field->fk_form_fields)->value('type')
            );

            array_push($mainArr, $arr);
        }
        $allFields = formfield::all();
        $page = new cforlfields($mainArr, $shopName, $allFields, $id);
        return $page->render();
    }

    public function SubmitAddFieldToShop(Request $req)
    {

        $insShopFields = new shopfield();
        $insShopFields->fk_shop = $req->shopId;
        $insShopFields->fk_form_fields = $req->type;
        $insShopFields->label = $req->label;
        $insShopFields->name = $req->name;
        $insShopFields->save();
        return $req->shopId;
    }

    public function AddShopFieldsData(Request $req)
    {

        $head = (array) $req->head;
        $tail = (array)$req->tail;
        for ($index = 0; $index < count($head); $index++) {
            $fieldData = new shopfielddata();
            $fieldData->fk_sf = $head[$index];
            $fieldData->value = $tail[$index];
            $fieldData->status = "1";
            $fieldData->save();
        }

        return  true;
    }



    public function ViewShopsFields($id)
    {
        $dev= ModelsShop::where('id',$id)->first();
        $fields=shopfield::where('fk_shop',$dev->id)->get();
        $shop = new cviewshopfielddata($dev->name,$fields);
        return $shop->render();
    }
    public function GetShopsFieldsData()
    {
        return DB::table('vw_get_shop_fields')->get();
    }
}
