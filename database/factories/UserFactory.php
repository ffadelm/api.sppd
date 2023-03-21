<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->freeEmail(),
            'nip' => fake()->unique()->randomElement([
                '196912312019121001',
                '196912312019121002',
                '196912312019121003',
                '196912312019121004',
                '196912312019121005',
                '196912312019121006',
                '196912312019121007',
                '196912312019121008',
                '196912312019121009',
                '196912312019121010',
                '196912312019121011',
                '196912312019121012',
                '196912312019121013',
                '196912312019121014',
                '196912312019121015',
                '196912312019121016',
                '196912312019121017',
                '196912312019121018',
                '196912312019121019',
                '196912312019121020',
                '196912312019121021',
                '196912312019121022',
                '196912312019121023',
                '196912312019121024',
                '196912312019121025',
                '196912312019121026',
                '196912312019121027',
                '196912312019121028',
                '196912312019121029',
                '196912312019121030'
            ]),
            'jabatan' => fake()->jobTitle(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
