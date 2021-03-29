<?php

namespace Database\Factories;

use App\Models\Ministere;
use Illuminate\Database\Eloquent\Factories\Factory;

class MinistereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ministere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'         => $this->faker-> realText($maxNbChars = 100, $indexSize = 2),
            'ministre'    => $this->faker-> realText($maxNbChars = 50, $indexSize = 2),
            'adresse'     => $this->faker-> address,
            'ministre_nomination_date'   => $this->faker-> datetime($max = 'now', $timezone = null),
            'boite_postal'               => $this->faker->postcode,
            
        ];
    }
}
