<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{

    protected static array $major = ['متخصص اطفال','متخصص داخلی','متخصص قلب','متخصص زنان','متخصص غدد','متخصص ارتوپدی',
    'متخصص گوش،حلق و بینی','متخصص مغز و اعصاب','متخصص چشم','متخصص رادیولوژی','متخصص پوست','متخصص اعصاب و روان'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'licence' => fake()->numberBetween(12345678,99999999),
            'major'=>fake()->randomElement(static::$major),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'avatar' => '14.png',
            'isActive' => 1
        ];
    }
}
                                                                                      