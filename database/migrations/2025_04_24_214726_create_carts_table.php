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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained()->onDelete('set null');
            $table->string('email');
            $table->string('name');
            $table->string('session_id')->nullable();
            $table->foreignId('products_id')->nullable()->constrained()->onDelete('set null');
            $table->string('product_image');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('price')->nullable();
            $table->enum('status', ['active', 'ordered', 'abandoned'])->default('active');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
