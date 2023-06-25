<?php

declare(strict_types=1);

use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
        });

        $brands = Brand::all();

        /** @var Brand $brand */
        foreach ($brands as $brand) {
            $brand->title = $brand->description;
            $brand->slug = Str::slug($brand->description);
            $brand->save();
        }

        Schema::table('brands', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('title');
        });
    }
};
