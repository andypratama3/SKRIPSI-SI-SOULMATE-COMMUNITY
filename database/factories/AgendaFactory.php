<?php

namespace Database\Factories;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agenda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_bidang' => $this->faker->randomDigitNotNull,
        'uraian_program' => $this->faker->text,
        'status_program' => $this->faker->word,
        'waktu_pelaksanaan' => $this->faker->word,
        'tempat_pelaksanaan' => $this->faker->text,
        'kegiatan' => $this->faker->text,
        'pelaksanaan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
