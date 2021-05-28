<?php

namespace Database\Seeders;

use App\Models\Materia;
use App\Models\User;
use App\Models\Note;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'e@admin.com',
            'password' => bcrypt('123456')
        ]);

        Note::factory(30)->create();

        Materia::factory(3)->create();
    }
}
