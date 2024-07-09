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
        Schema::create('tag_todo', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('tag_id');
            $table->foreign("tag_id")->references("id")->on('tags')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->foreignId("todo_id")->constrained()
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->unsignedInteger("index")->comment('Position du tag');
            $table->unique(['tag_id', 'todo_id', 'index']);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_todo');
    }
};
