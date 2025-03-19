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
        Schema::create('role_permission', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained(
                table: 'roles', indexName: 'role_permission_role_id'
            )->onDelete('cascade');
            $table->foreignId('permission_id')->constrained(
                table: 'permissions', indexName: 'role_permission_permission_id'
            )->onDelete('cascade');
            $table->primary(['role_id', 'permission_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permission');
    }
};
