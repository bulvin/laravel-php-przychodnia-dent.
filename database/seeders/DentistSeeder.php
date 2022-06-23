<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Dentist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DentistSeeder extends Seeder
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
        Dentist::truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('dentists')->insert([

            'fullname' => 'Dr Janek Dzbanek',
            'birthday_date' => '1990-12-12', 'gender' => 'Mężczyzna',
             'contact_number' => '986756783', 'specialization' => 'Stomatologia zachowawcza z endodoncją',
             'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
             'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),



        ]);
        DB::table('dentists')->insert([

            'fullname' => 'Dominik Orzech',
            'birthday_date' => '1987-06-13', 'gender' => 'Mężczyzna',
            'contact_number' => '123456789', 'specialization' => 'Periodontologia',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('dentists')->insert([

            'fullname' => 'lek. dent. Maria Maseł',
            'birthday_date' => '1991-10-11', 'gender' => 'Kobieta',
            'contact_number' => '123345678', 'specialization' => 'Stomatologia dziecięca',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('dentists')->insert([

            'fullname' => 'Dr Maciej Kopciok',
            'birthday_date' => '1983-02-04', 'gender' => 'Mężczyzna',
            'contact_number' => '186756783', 'specialization' => 'Ortodoncja',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),

        ]);
        DB::table('dentists')->insert([

            'fullname' => 'lek. dent. Weronika Maj',
            'birthday_date' => '1992-07-21', 'gender' => 'Kobieta',
            'contact_number' => '555444333', 'specialization' => 'Stomatologia zachowawcza z endodoncją',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),

        ]);

    }
}
