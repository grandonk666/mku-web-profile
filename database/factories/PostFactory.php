<?php

namespace Database\Factories;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $judul = $this->faker->sentence(mt_rand(2, 5));
        $slug = SlugService::createSlug(Post::class, 'slug', $judul);
        $paragraphs = $this->faker->paragraphs(10);
        $body = "<div>" . join("</div><div>", $paragraphs) . "</div>";
        $excerpt = Str::limit(strip_tags($body), 170, '...');
        return [
            "judul" => $judul,
            "slug" => $slug,
            "excerpt" => $excerpt,
            "body" => $body,
            "kategori_id" => mt_rand(1, 2)
        ];
    }
}
