<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->string('telegram')->nullable();
            $table->string('viber')->nullable();
            $table->string('vk')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('ok')->nullable();
            $table->string('youtube')->nullable();

            $table->text('description')->nullable();
            $table->text('keys')->nullable();

            $table->timestamps();
        });

        $createdAt = now();

        $seeds = [
            [
                'name' => 'БелИнструментТорг',
                'slug' => 'base',
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ],
        ];

        DB::table('settings')->insert($seeds);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
