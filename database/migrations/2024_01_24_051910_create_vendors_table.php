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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo',255)->nullable();
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('mainCategory_id',false);
            $table->enum('active',[0,1])->default(0)->comment("'0' is for not active and '1' is for active");
            // $table->integer('subscription_price')->unsigned();
            // $table->date('subscription_payment_date');
            $table->string('google_map_address')->nullable();
            $table->timestamps();
            $table->foreign('mainCategory_id')->references('id')->on('main_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
