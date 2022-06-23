<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class AppointmentSeeder extends Seeder
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

        Schema::enableForeignKeyConstraints();
        DB::table('appointments')->insert([

            'patient_id' => '1',
            'dentist_id' => '3',
            'appointment_date' => '2022-06-01',
            'appointment_hour' => '08:15',
            'status' => 'Potwierdzony',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),


        ]);
        DB::table('appointments')->insert([

            'patient_id' => '2',
            'dentist_id' => '4',
            'appointment_date' => '2022-06-01',
            'appointment_hour' => '09:00',
            'status' => 'Oczekuje',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),


        ]);
    }
}
