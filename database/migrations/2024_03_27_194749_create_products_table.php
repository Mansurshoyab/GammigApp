<?php

use App\Enums\StatusEnum;
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
            $table->foreignId('category_id')->nullable();
            $table->string('title', 100);
            $table->string('price', 100);
            $table->string('thumbnail', 250)->nullable();
            $table->string('image', 250)->nullable();
            $table->longtext('description')->nullable();
            $table->string('slug', 150)->unique();
            $table->enum('status', [StatusEnum::ENABLE, StatusEnum::DISABLE])->default(StatusEnum::DISABLE)->comment('set disable as default')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
