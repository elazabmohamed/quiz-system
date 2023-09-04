<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //\App\Models\User::factory()->count(20)->create();

        $json = Storage::disk('local')->get('/json/users.json');
        $users = json_decode($json, true);

        foreach($users as $user){
            User::query()->updateOrCreate([
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'type' => $user['type'],
                'password' => $user['password'],
            ]);
        }
    }
}
