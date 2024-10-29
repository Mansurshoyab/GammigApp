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
        Schema::create('seed_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seed_category_id')->nullable();
            $table->string('title', 100)->unique();
            $table->longtext('description')->nullable();
            $table->string('thumbnail', 250)->nullable();
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
        Schema::dropIfExists('seed_products');
    }
};
