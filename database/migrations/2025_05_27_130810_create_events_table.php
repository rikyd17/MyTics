<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->date('date');
        $table->time('time');
        $table->decimal('price', 10, 2);
        $table->string('location');// Pastikan kolom ini ada
        $table->string('image');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down() {
    Schema::table('events', function (Blueprint $table) {
        $table->string('wifi_info')->nullable(); // Opsional: untuk rollback
    });
}
};