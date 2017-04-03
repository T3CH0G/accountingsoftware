<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations',function($newtable)
        {
            $newtable->increments('id');
            $newtable->integer('client_id');
            $newtable->string('quotation_id');
            $newtable->string('subject');
            $newtable->string('item');
            $newtable->text('description');
            $newtable->decimal('cost',10,2);
            $newtable->integer('quantity');
            $newtable->integer('discount')->default(0);
            $newtable->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quotations');
    }
}
