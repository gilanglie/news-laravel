<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $title = $faker->sentence(6);
            $img = $faker->imageUrl($width = 1080, $height = 720);
            $text = $faker->paragraph(50);
            $tag = $faker->randomElement($array = array ('business','lifestyle','sport','tech','travel'));
            Article::create([
                'title' => $title,
                'img' => $img,
                'text' => $text,
                'tag' => $tag
            ]);
        }
    }
}
