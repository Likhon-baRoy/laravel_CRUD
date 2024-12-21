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
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('username')  -> unique();
      $table->string('email')     -> unique();
      $table->string('cell')      -> unique();
      $table->string('education');
      $table->text('photo')       -> nullable();
      $table->integer('age');
      $table->string('gender');
      $table->string('courses')   -> nullable() -> default('[]'); /* ensures that when no value is provided, it defaults to an empty JSON array string */
      $table->boolean('status')   -> default(true);
      $table->boolean('trash')    -> default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('students');
  }
};
