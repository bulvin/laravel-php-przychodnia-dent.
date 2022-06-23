<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('roles')->upsert(
            [
                [
                    'name' => 'admin',
                ],
                [
                    'name' => 'dentysta'
                ],
                [
                    'name' => 'pacjent'
                ]
            ],
            'name'
        );
    }
}
