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
        Schema::create('seniority', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
                ->nullable()
                ->constrained('students')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('place_work', 100)->nullable();
            /** TODO Для 'profession' вернуть значение в 75 */
            $table->string('profession', 100)->nullable();
            $table->integer('years')->nullable();
            $table->integer('months')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seniority');
    }
};
