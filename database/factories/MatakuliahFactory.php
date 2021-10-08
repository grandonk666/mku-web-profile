<?php

namespace Database\Factories;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatakuliahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Matakuliah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $matkul = ["Bahasa Indonesia", "Agama Islam", "Bahasa Inggris", "Bela Negara", "Pendidikan Pancasila"];
        return [
            "nama" => $matkul[mt_rand(0, 4)],
            "kode" => $this->faker->numerify('G####'),
            "dosen_id" => mt_rand(1, 10)
        ];
    }
}
