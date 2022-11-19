<?php

namespace Database\Factories;

use App\Models\Tipo_Convenio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Tipo_ConvenioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Tipo_Convenio::class;

    public function definition()
    {
        return [
            'convenio'=>$this->faker->name(),	
            'anotaciones'=>$this->faker->sentence()
        ];
    }
}
