<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('original_price', 10, 2)->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->string('label')->nullable();
            $table->decimal('rating', 2, 1)->nullable();
            $table->integer('rating_count')->nullable()->default(0);
            $table->boolean('status')->default(false);
            $table->longText('description')->nullable();
            $table->string('sku')->nullable()->unique();
            $table->integer('stock_quantity')->nullable();
            $table->enum('stock_status', ['in_stock', 'out_of_stock', 'pre_order'])->default('in_stock')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('products');
    }
};
