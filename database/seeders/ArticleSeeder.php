<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'Space Forces secretive X-37B space plane soars past 1 year in orbit',
            'content' => 'That U.S. Space Force X-37B Orbital Test Vehicle (OTV-7) has silently slipped past one-year of flight time. The craft is engaged in performing aerobrake maneuvers, a technique to alter its orbit around Earth, as well as safely dispose of its attached service module. Lofted in December of 2023, the military spaceplane was placed in an orbit higher than any of the earlier space plane missions – into a highly elliptical high Earth orbit.',
            'author' => 'Leonard David',
            'category_id' => '1'
        ]);
    }
}
