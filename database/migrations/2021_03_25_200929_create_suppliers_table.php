<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('name', 255);
            $table->string('registered_by',20);
            $table->timestamps();
        });

        Schema::create('products_suppliers', function (Blueprint $table) {
            $table->unsignedBigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('restrict');
            $table->unsignedBigInteger('suppliers_id');
            $table->foreign('suppliers_id')->references('id')->on('suppliers')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('suppliers_id')->nullable();
            $table->foreign('suppliers _id')->references('id')->on('suppliers')->onDelete('restrict');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products_suppliers');
        Schema::dropIfExists('suppliers');
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('suppliers _id');
        });
        Schema::enableForeignKeyConstraints();

    }
}
