<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class VwGetShopFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement($this->createView());
       
         
    }

   
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
        //
    }
    private function createView(): string
    {
        return "
        create view vw_get_shop_fields as
            select 
            shopfielddatas.id as `id`,shopfielddatas.value as `value`,shopfielddatas.created_at,shopfielddatas.updated_at,
            sf.fk_shop as shop,sf.label,
            ff.type as field_type
            from shopfielddatas
            inner join shopfields as sf on sf.id=shopfielddatas.fk_sf
            inner join formfields as ff On ff.id=sf.fk_form_fields";
    }
    private function dropView(): string
    {
        return "DROP VIEW IF EXISTS `vw_get_shop_fields`";
           
    }
}
