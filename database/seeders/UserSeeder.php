<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::factory()->create([
            "name" => "Ruben",
            "surname" => "Mariscal",
            "nick" => "ruben",
            "email" => "rubenmariscalgil@gmail.com"
        ]);

        User::factory(5)->create();
    }
}
