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
        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('type')->default('chat')->nullable();
            $table->string('category')->nullable();
            $table->text('user_query')->nullable();
            $table->text('response')->nullable();

            $table->string('assistant_id')->nullable();
            $table->string('thread_id')->nullable();

            $table->text('image_prompt')->nullable();
            $table->text('image_request_id')->nullable();
            $table->integer('count')->nullable()->default(0);

            $table->enum('status_image', ['waiting', 'generate', 'end', 'error'])->default('waiting')->nullable();
            $table->string('errorMessage')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
