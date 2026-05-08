<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private function addUserIdColumn(Blueprint $table): void
    {
        $table->foreignId('user_id')
            ->nullable()
            ->after('id')
            ->constrained()
            ->cascadeOnDelete();
    }

    private function dropUserIdColumn(Blueprint $table): void
    {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $this->addUserIdColumn($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $this->dropUserIdColumn($table);
        });
    }
};
