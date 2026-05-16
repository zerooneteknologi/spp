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
        Schema::create('dsp_installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dsp_plan_id')->constrained('dsp_plans')->cascadeOnDelete();
            $table->integer('installment_number');
            $table->decimal('amount', 12, 2);
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dsp_installments');
    }
};
