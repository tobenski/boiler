<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(1000),
            'short_description' => $this->faker->text(150),
            'keywords' => $this->faker->words(5, true),
            'header_1' => $this->faker->words(3, true),
            'header_2' => $this->faker->words(2, true),
            'content_1' => $this->faker->text(500),
            'content_2' => $this->faker->text(500),
            'content_3' => $this->faker->text(500),
            'content_4' => $this->faker->text(500),
            'notes' => $this->faker->text(500),
            'online' => $this->faker->boolean(85),
        ];
    }
}
