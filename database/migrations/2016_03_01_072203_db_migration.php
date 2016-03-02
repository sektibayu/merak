<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DbMigration extends Migration
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
            $table->string('used');
            $table->boolean('enabled');
        });

        Schema::create('Item',function(Blueprint $table)
        {
            $table->increments('itemid');
            $table->integer('rackid');
            $table->string('name');
            $table->integer('price');
            $table->string('spec');
            $table->integer('stock');
            $table->integer('pieces');
        });

        Schema::create('ItemTransaction',function(Blueprint $table)
        {
            $table->integer('itemid');
            $table->integer('transactionid');
            $table->integer('count');
            $table->string('desc');
        });

        Schema::create('Transaction',function(Blueprint $table)
        {
            $table->increments('transactionid');
            $table->timestamp('time');
            $table->integer('userid');
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

        Schema::create('UserGroup',function(Blueprint $table)
        {
            $table->integer('userid');
            $table->integer('groupid');
        });

        Schema::create('Group',function(Blueprint $table)
        {
            $table->increments('groupid');
            $table->string('name');
        });

        Schema::create('GroupMenu',function(Blueprint $table)
        {
            $table->integer('groupid');
            $table->integer('menuid');
        });

        Schema::Create('Menu',function(Blueprint $table)
        {
            $table->increments('menuid');
            $table->string('name');
            $table->string('url');
            $table->integer('level');
            $table->boolean('enabled');
        });

        Schema::Create('GroupRoute',function(Blueprint $table)
        {
            $table->integer('groupid');
            $table->integer('routeid');
        });

        Schema::Create('Route',function(Blueprint $table)
        {
            $table->increments('routeid');
            $table->string('url');
            $table->boolean('enabled');
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
        Schema::dropIfExists('ItemTransaction');
        Schema::dropIfExists('Transaction');
        Schema::dropIfExists('Status');
        Schema::dropIfExists('User');
        Schema::dropIfExists('UserGroup');
        Schema::dropIfExists('Group');
        Schema::dropIfExists('GroupMenu');
        Schema::dropIfExists('Menu');
        Schema::dropIfExists('GroupRoute');
        Schema::dropIfExists('Route');
    }
}
