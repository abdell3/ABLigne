<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Enrollment::class;

    public function definition(): array
    {

        
        $student = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->inRandomOrder()->first();

        
        $course = Course::inRandomOrder()->first();

        
        $statuses = ['pending', 'accepted', 'rejected'];

        return [
            'user_id' => $student->id,
            'course_id' => $course->id,
            'status' => $this->faker->randomElement($statuses),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
