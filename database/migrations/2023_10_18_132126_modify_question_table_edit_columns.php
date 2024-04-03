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
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign('questions_category_id_foreign');
            $table->dropColumn(['level', 'content', 'category_id']);
            $table->string('question_image_path')->nullable();
            $table->string('right_answer', 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->text('content');
            $table->tinyInteger('level')->comment('1: easy, 2: medium, 3:hard, 4:very hard');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->dropColumn(['question_image_path', 'right_answer']);
        });
    }
};
