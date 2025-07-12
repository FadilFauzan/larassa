<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            "title" => "Larassa x Maliq D'Essentials",
            "slug" => "larassaxmaliq",
            "image" => "/img/event/event1.jpg",
            "description" => "Suka musik chill tapi tetap classy? Maliq & D’Essentials siap manjain telinga kamu dengan groove dan soul yang bikin auto ngangguk-ngangguk. Jangan cuma scroll-scroll di rumah, catat tanggalnya dan rasain vibes-nya langsung di Larassa!",
            "date" => "15 Juli 2025"
        ]);
    }
}
