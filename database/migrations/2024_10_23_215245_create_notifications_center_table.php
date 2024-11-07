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
        Schema::create('notifications_center', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(0);
            $table->boolean('processed')->default(0);
            $table->string('type_notification');
            $table->text('title');
            $table->longText('content');
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->default(null);
            $table->boolean('automatic')->default(0);
            $table->integer('action_id')->constrained('notification_automated_actions', 'id')->nullable();
            $table->dateTime('scheduled')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications_center');
    }
};
