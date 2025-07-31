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
        Schema::create('candidates', function (Blueprint $table) {
            $table->string('nik', 16)->primary();
            $table->string('fullname', 120);
            $table->string('email', 255);
            $table->string('no_telp', 12);
            $table->text('address');
            $table->string('prev_school', 120)->comment('sekolah sblmnya');
            $table->string('parent_name', 120);
            $table->string('parent_telp', 12);
            $table->string('parent_email', 255)->nullable();
            $table->string('major', 255)->comment('bisa lebih dari 1 dan maksimal 3');
            $table->date('submit_date');
            $table->date('birth_date');
            $table->integer(column: 'phase')->comment('1: gelombang 1, 4: gelombang extra');
            $table->enum('gender', ['male', 'female']);
            $table->enum('status', ['unverified', 'verified', 'active'])->default('unverified');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
