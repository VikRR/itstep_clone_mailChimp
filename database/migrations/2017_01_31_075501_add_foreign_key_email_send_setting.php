<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyEmailSendSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_send_settings', function(Blueprint $table){
          $table->foreign('user_id','FK_email_send_settings_users')->references('id')->on('users');
          $table->foreign('email_send_type_id','FK_email_send_settings_email_send_types')->references('id')->on('email_send_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_send_settings', function(Blueprint $table){
          $table->dropForeign('FK_email_send_settings_users');
          $table->dropForeign('FK_email_send_settings_email_send_types');
        });
    }
}
