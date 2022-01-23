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
            $table->string('price');
            $table->string('discount');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('is_active')->default('0');
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
