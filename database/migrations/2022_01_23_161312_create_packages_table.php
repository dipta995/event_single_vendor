<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('pr_title');
            $table->unsignedBigInteger('cat_id');
            $table->integer('day');
            $table->string('price');
            $table->string('discount');
            $table->string('slug')->unique();
            $table->string('image');
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->integer('is_active')->default('0');
            $table->integer('home_view')->default('0');
            $table->timestamps();
            $table->foreign('cat_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
