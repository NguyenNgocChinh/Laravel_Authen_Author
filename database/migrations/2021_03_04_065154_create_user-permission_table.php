<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user-permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permissionId');
            $table->foreign('permissionId')->on('permission')->references('id');

            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user-permission');
    }
}
