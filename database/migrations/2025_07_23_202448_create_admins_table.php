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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 120);
            $table->string('email', 255);
            $table->text('password_hash')->comment("password akan di hash ya teman'");
            $table->date('created_at');
            $table->date('update_at');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->rememberToken();

            $table->foreign('created_by')->references('id')->on('admins')->nullOnDelete()->nullOnUpdate();
            $table->foreign('updated_by')->references('id')->on('admins')->nullOnDelete()->nullOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
