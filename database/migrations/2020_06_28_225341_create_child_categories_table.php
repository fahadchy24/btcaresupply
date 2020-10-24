<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcategory_id')->unsigned();
            $table->string('childcategory_name');
            $table->string('childcategory_url');
            $table->text('childcategory_description')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('cover_image');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategory_id');
        Schema::dropIfExists('child_categories');
    }
}
