<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name')->nullable();
            $table->string('location')->nullable();

            // Correct method for unsigned big integer
            $table->unsignedBigInteger('siteadmin_id')->nullable();
            $table->foreign('siteadmin_id')->references('id')->on('siteadmins')->onDelete('cascade');

            $table->boolean('status')->nullable();
            $table->timestamps();
            $table->json('data')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
}
