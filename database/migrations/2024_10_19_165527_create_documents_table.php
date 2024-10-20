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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('number')->unique(); // Auto-generated and unique
            $table->decimal('amount', 10, 2); // Field for DH درهم amount
            $table->string('received_from'); // Field for the name of the person
            $table->string('sum'); // Field for the sum in words
            $table->string('purpose'); // Field for the purpose/reason
            $table->string('location'); // Field for the location
            $table->date('date'); // Field for the date
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
