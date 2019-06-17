<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user')) {
            Schema::create('user', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->char('name',100);
                $table->char('phone',15)->nullable();
                $table->char('email',100)->nullable();
                $table->timestamp('created_at');
                $table->dateTime('updated_at')->nullable();
                $table->dateTime('deleted_at')->nullable();
                
            });    
        }
        
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('user')) {
            Schema::drop('user');
        }
    }
}
