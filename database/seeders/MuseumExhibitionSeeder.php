<?php

namespace Database\Seeders;

use App\Models\Exhibition;
use App\Models\Museum;
use Illuminate\Database\Seeder;

class MuseumExhibitionSeeder extends Seeder
{
    public function run(): void
    {
        $istanbulModern = Museum::create([
            'name' => 'Istanbul Modern',
        ]);

        $rahmiKoç = Museum::create([
            'name' => 'Rahmi M. Koç Museum',
        ]);

        $peraMuseum = Museum::create([
            'name' => 'Pera Museum',
        ]);

        $zeugma = Museum::create([
            'name' => 'Zeugma Mosaic Museum',
        ]);

        Exhibition::create([
            'title' => 'Contemporary Turkish Art',
            'description' => 'Paintings, installations, and new media works by leading Turkish artists from the 2000s to today.',
            'date' => '2026-02-14',
            'museum_id' => $istanbulModern->id,
        ]);

        Exhibition::create([
            'title' => 'Photography and the City',
            'description' => 'Urban life in Istanbul captured through documentary and street photography.',
            'date' => '2026-06-01',
            'museum_id' => $istanbulModern->id,
        ]);

        Exhibition::create([
            'title' => 'Industrial Heritage',
            'description' => 'Historic machines, maritime artifacts, and the story of Turkish industry on the Golden Horn.',
            'date' => '2026-03-22',
            'museum_id' => $rahmiKoç->id,
        ]);

        Exhibition::create([
            'title' => 'Orientalist Painting Collection',
            'description' => 'European painters’ views of the Ottoman world, from court scenes to everyday street life.',
            'date' => '2026-04-18',
            'museum_id' => $peraMuseum->id,
        ]);

        Exhibition::create([
            'title' => 'Gypsy Girl and Ancient Mosaics',
            'description' => 'Roman floor mosaics from Zeugma, including the famous Gypsy Girl fragment.',
            'date' => '2026-05-10',
            'museum_id' => $zeugma->id,
        ]);
    }
}
