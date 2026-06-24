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
        if (Schema::hasTable('documentation_files')
            && Schema::hasColumn('documentation_files', 'file_name')
            && ! Schema::hasColumn('documentation_files', 'title')) {
            Schema::table('documentation_files', function (Blueprint $table) {
                $table->renameColumn('file_name', 'title');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('documentation_files')
            && Schema::hasColumn('documentation_files', 'title')
            && ! Schema::hasColumn('documentation_files', 'file_name')) {
            Schema::table('documentation_files', function (Blueprint $table) {
                $table->renameColumn('title', 'file_name');
            });
        }
    }
};
