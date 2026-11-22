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
        // The column is also defined in the create_students_table migration,
        // so only add it when it is missing (existing databases).
        if (! Schema::hasColumn('students', 'image')) {
            Schema::table('students', function (Blueprint $table) {
                $table->string('image')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Leave the column in place: it belongs to the create_students_table migration.
    }
};
