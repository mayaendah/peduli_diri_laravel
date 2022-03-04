<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'maya',
            'email'=>'maya@gmail.com',
            'password'=>bcrypt('12345678'),
            'remember_token'=>Str::random(60)
        ]);
    }
}
