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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique()->nullable();
            $table->string('gender')->default('male');
            $table->string('email')->unique()->index();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId('country_id')->nullable()->references('id')->on('countries');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
