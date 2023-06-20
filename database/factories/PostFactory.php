<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new FakerPicsumImagesProvider($this->faker));
        $filename = $this->faker->image('public/storage/images', 1920, 1080, false);

        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->realText(),
            'subtitle' => $this->faker->sentence(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'image' => "images/$filename",
        ];
    }
}
