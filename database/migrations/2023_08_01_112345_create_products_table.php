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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->String("name", 100);
            $table->text("description")->nullable();
            $table->String("image", 100)->nullable();
            $table->unsignedTinyInteger("category");
            $table->unsignedBigInteger("price");
            $table->unsignedTinyInteger("status")->comments("1 - Active / 0 - Inactive");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
