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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id");
            // $table->foreignId("user_id")->default();
            $table->integer("jumlah");
            $table->integer("harga_ongkir")->default(0);
            $table->integer("harga_produk")->default(0);;
            $table->integer("diskon")->default(0);
            $table->integer("total_harga")->default(0);
            $table->string("tipe");
            $table->string("status")->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
};
