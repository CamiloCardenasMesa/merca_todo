<?php

use App\Constants\States;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('currency');
            $table->enum('state', [States::APPROVED, States::REJECTED, States::PENDING]);
            $table->string('process_url')->nullable();
            $table->string('session_id')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->bigInteger('total');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
