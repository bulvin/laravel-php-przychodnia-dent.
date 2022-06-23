<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Support\Carbon;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Appointment::truncate();
        Patient::truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('patients')->insert([

            'firstname' => 'Dominik', 'secondname' => 'Bauer',
             'gender' => 'Mężczyzna',
            'contact_number' => '985756783',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),



        ]);
        DB::table('patients')->insert([

            'firstname' => 'Magdalena', 'secondname' => 'Marcyn',
            'gender' => 'Kobieta',
           'contact_number' => '984356783',
           'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
           'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('patients')->insert([

            'firstname' => 'Marcin', 'secondname' => 'Marcinek',
            'gender' => 'Mężczyzna',
           'contact_number' => '986756000',
           'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
           'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),


        ]);
        DB::table('patients')->insert([

            'firstname' => 'Mieczysław', 'secondname' => 'Zamek',
            'gender' => 'Mężczyzna',
           'contact_number' => '555756000',
           'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
           'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('patients')->insert([

            'firstname' => 'Agnieszka', 'secondname' => 'Aser',
            'gender' => 'Kobieta',
           'contact_number' => '454746040',
           'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
           'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),

        ]);

    }
}
