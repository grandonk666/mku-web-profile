<?php

namespace Database\Factories;

use App\Models\Matakuliah;
use Cviebrock\EloquentSluggable\Services\SlugService;
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
        $nama = $matkul[mt_rand(0, 4)];
        $paragraphs = $this->faker->paragraphs(10);
        $detail = "<div>" . join("</div><div>", $paragraphs) . "</div>";
        return [
            "nama" => $nama,
            "detail" => $detail,
            "slug" => SlugService::createSlug(Matakuliah::class, 'slug', $nama)
        ];
    }
}
