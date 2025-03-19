<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Course::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'couverture' => $this->faker->imageUrl,
            'langague' => $this->faker->randomElement(['fr', 'en', 'es', 'de']),
            'duration' => $this->faker->numberBetween(1, 20),
            'difficulty_level' => $this->faker->randomElement(['débutant', 'intermédiare', 'avancé']),
            'status' => $this->faker->randomElement(['ouvert', 'en cours', 'terminé']),
            'category_id' => Category::factory(),
            'sub_category_id' => SubCategory::factory(), 
        ];
    }
}
