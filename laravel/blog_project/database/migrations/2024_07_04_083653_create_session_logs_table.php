<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionLogsTable extends Migration
{
    public function up()
    {
        Schema::create('session_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('user_agent')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamp('login_time');
            $table->timestamp('logout_time')->nullable();
            $table->string('activity')->nullable();
            $table->integer('cookie_id')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('session_logs');
    }
}
