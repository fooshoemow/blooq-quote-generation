<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('line_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('quantity', 8, 2);
            $table->string('currency_code');
            $table->decimal('amount', 8, 2);
            $table->unsignedBigInteger('quote_id');
            $table->timestamps();

            $table->foreign('quote_id')
                ->references('id')
                ->on('quotes')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('line_items');
    }
};
