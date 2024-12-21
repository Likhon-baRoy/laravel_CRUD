<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'title'    => $this -> faker -> sentence(5),
      'content'  => $this -> faker -> paragraph(3),
      'image'    => 'https://shorturl.at/8M8KJ',
      'author'   => $this -> faker -> name('female')
    ];
  }
}
