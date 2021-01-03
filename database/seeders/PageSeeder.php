<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forside = Page::factory()->create([
            'name' => 'Forside',
            'online' => true,
        ]);
        $forside->slug = '';
        $forside->save();

        Page::factory()->count(8)->create();
    }
}
