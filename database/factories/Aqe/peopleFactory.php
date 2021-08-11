<?php

namespace Database\Factories\Aqe;

use App\Models\Aqe\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['m', 'w', 'd']),
            'street' => $this->faker->streetAddress(),
            'postalCode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country()
        ];
    }


}
