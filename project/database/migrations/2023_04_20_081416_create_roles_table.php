<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("users"); // 1 - see users, 2 - create users, 4 - create users only in facility, 8 - edit and delete users, 16 - edit and delete users in facility
            $table->integer("schedules"); // 1 - see, 2 - create, 4 - create only in facility, 8 - edit and deleter, 16 - edit and delete is facility
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
