<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quartas', function (Blueprint $table) {
            $table->string('quarta_id')->unique();
            $table->string('available');
            $table->text('url');
            $table->string('price');
            $table->string('oldprice');
            $table->string('currencyid');
            $table->string('category');
            $table->string('sub_category');
            $table->string('sub_sub_category');
            $table->text('picture');
            $table->string('name');
            $table->string('vendor');

            #$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quartas');
    }
};
