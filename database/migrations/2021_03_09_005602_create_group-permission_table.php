<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group-permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('groupId');
            $table->foreign('groupId')->references('id')->on('group')->onDelete('cascade');

            $table->unsignedBigInteger('permissionId');
            $table->foreign('permissionId')->references('id')->on('permission')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group-permission');
    }
}
