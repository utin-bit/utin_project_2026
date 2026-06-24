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
        if (! Schema::hasTable('documentation_files')) {
            return;
        }

        Schema::table('documentation_files', function (Blueprint $table) {
            if (! Schema::hasColumn('documentation_files', 'title')) {
                $table->string('title')->after('id');
            }

            if (! Schema::hasColumn('documentation_files', 'file_path')) {
                $table->string('file_path')->after('title');
            }

            if (! Schema::hasColumn('documentation_files', 'file_type')) {
                $table->string('file_type')->after('file_path');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('documentation_files')) {
            return;
        }

        Schema::table('documentation_files', function (Blueprint $table) {
            if (Schema::hasColumn('documentation_files', 'file_type')) {
                $table->dropColumn('file_type');
            }

            if (Schema::hasColumn('documentation_files', 'file_path')) {
                $table->dropColumn('file_path');
            }

            if (Schema::hasColumn('documentation_files', 'title')) {
                $table->dropColumn('title');
            }
        });
    }
};
