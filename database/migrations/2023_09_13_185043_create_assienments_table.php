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
        Schema::create('assienments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');
            $table->boolean('complete')->default(false);
            $table->timestamps();
            $table->timestamp('due_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assienments');
    }
};
