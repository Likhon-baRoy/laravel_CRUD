<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Staff;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // User::factory(10)->create();

    /* User::factory()->create([
     *   'name' => 'Test User',
     *   'email' => 'test@example.com',
     * ]); */

    Post::factory(10) -> create();

    Staff::create([
      'name'    => 'Super Admin',
      'email'   => 'admin@gmail.com',
      'cell'    => '01532089526'
    ]);

    Staff::create([
      'name'    => 'Likhon Baroi',
      'email'   => 'likhonhere007@gmail.com',
      'cell'    => '01632089526'
    ]);
  }
}
