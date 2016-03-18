<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Rack',function(Blueprint $table)
        {
            $table->increments('rackid');
            $table->string('code');
//            $table->string('used');
            $table->boolean('enabled');
        });

        Schema::create('Item',function(Blueprint $table)
        {
            $table->increments('itemid');
            $table->integer('rackid');
            $table->string('name');
            $table->string('no_part');
            $table->integer('price');
            $table->string('spec');
            $table->integer('stock');
            $table->string('pieces');
        });

//        Schema::create('ItemTransaction',function(Blueprint $table)
//        {
//            $table->integer('itemid');
//            $table->integer('transactionid');
//            $table->integer('count');
//            $table->string('desc');
//        });

        Schema::create('Transaction',function(Blueprint $table)
        {
            $table->increments('transactionid');
            $table->timestamp('time');
            $table->integer('userid');
            $table->boolean('inout');
            $table->integer('itemid');
            $table->integer('statusid');
            $table->integer('count');
            $table->integer('tmp_stock');
        });

        Schema::create('Status',function(Blueprint $table)
        {
            $table->increments('statusid');
            $table->string('desc');
        });

        Schema::create('User',function(Blueprint $table)
        {
            $table->increments('userid');
            $table->string('name');
            $table->string('username');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Rack');
        Schema::dropIfExists('Item');
//        Schema::dropIfExists('ItemTransaction');
        Schema::dropIfExists('Transaction');
        Schema::dropIfExists('Status');
        Schema::dropIfExists('User');
    }
}
