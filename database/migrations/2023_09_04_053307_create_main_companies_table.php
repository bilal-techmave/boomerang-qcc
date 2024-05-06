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
        Schema::create('main_companies', function (Blueprint $table) {
            $table->id();
            $table->string('business_nam');
            $table->string('abn');
            $table->string('unit')->nullable();
            $table->string('address_number');
            $table->string('street_address');
            $table->string('suburb');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_companies');
    }
};
