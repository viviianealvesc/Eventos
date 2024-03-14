<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. (Executar as migrações)
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('category', 100);
        });
    }

    /**
     * Reverse the migrations. (Reverter as migrações)
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
