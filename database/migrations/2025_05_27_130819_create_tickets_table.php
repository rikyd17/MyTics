<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('tickets', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('event_id')->constrained()->onDelete('cascade');
    $table->string('name');
    $table->string('email');
    $table->string('phone');
    $table->string('code')->default('TEMP');
    $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
    $table->integer('quantity');
    $table->decimal('total_price', 10, 2);
    $table->timestamps();
});
}


    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
