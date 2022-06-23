<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::upsert(
            [
                [
                    'name' => 'admin', 'email' => 'jan@email.com', 'password' => Hash::make('1234'),
                    'role_id' => 1,
                ],
            ],
            'email'
        );
    }
}
