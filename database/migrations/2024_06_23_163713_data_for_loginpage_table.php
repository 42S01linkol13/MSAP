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
        Schema::create('data_for_loginpage', function (Blueprint $table) {
            $table->id();
            $table->string('root',191);
            $table->string('user',191);
            $table->string('password',191);
            $table->boolean('is_registered');
            $table->timestamp('updated_at', 6);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_for_loginpage');
    }
};
