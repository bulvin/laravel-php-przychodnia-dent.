<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class AppointmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('appointment_service')->truncate();

        Schema::enableForeignKeyConstraints();


        DB::table('appointment_service')->insert([

            'appointment_id' => '1',
            'service_id' => '1',
           // 'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
           // 'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),


        ]);
        DB::table('appointment_service')->insert([

            'appointment_id' => '1',
            'service_id' => '2',
          //  'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
           // 'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),


        ]);
        DB::table('appointment_service')->insert([

            'appointment_id' => '2',
            'service_id' => '4',
          //  'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
           // 'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),


        ]);
        DB::table('appointment_service')->insert([

            'appointment_id' => '2',
            'service_id' => '1',
           // 'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
           // 'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),


        ]);
    }
}
