<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyListSubscriber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_subscribers', function (Blueprint $table){
          $table->foreign('list_id', 'FK_lists_subscribers_lists')->references('id')->on('lists');
          $table->foreign('subscriber_id', 'FK_lists_subscribers_subscribers')->references('id')->on('subscribers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_subscribers', function (Blueprint $table){
          $table->dropForeign('FK_lists_subscribers_lists');
          $table->dropForeign('FK_lists_subscribers_subscribers');
        });
    }
}
