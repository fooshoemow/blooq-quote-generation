<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('statuses')->insert([
            ['name' => 'Draft'],
            ['name' => 'Sent'],
        ]);
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('statuses');
        Schema::enableForeignKeyConstraints();
    }
};
