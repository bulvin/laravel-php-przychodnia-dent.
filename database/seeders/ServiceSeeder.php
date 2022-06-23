<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        Service::truncate();

        Schema::enableForeignKeyConstraints();

        Service::upsert(
            [
                [
                    'name' => 'Skaling', 'description' =>'Jest to zabieg polegający na profesjonalnym usunięciu kamienia nazębnego. Na powierzchni szkliwa odkłada się płytka nazębna, która mineralizuje się już po 3-4 dniach, mimo codziennego szczotkowania. Tworzą ją bakterie, substancje zawarte w ślinie i resztki pokarmów. Początkowo taki osad jest miękki i prawie nie różni się kolorem od szkliwa.',
                    'price'=> 100
                ],
                [
                    'name' => 'Piaskowanie zębów', 'description' => 'Jest to zabieg pozwalający usunąć przebarwienia koron zębów pochodzenia zewnętrznego (palenie tytoniu, kawa, herbata, czerwone wino, niektóre napoje). Służą do tego specjalne aparaty z końcówką, w której mieszany jest preparat sodu ( imitujący piasek,), woda i powietrze. Mieszanka ta wydostając się pod ciśnieniem z końcówki, usuwa osady z powierzchni szkliwa, przywracając mu naturalny odcień.',
                    'price'=> 50
                ],
                [
                    'name' => 'Lakierowanie zębów', 'description' => 'Lakierowanie zębów jest metodą wzbogacania powierzchownych warstw szkliwa w jony fluoru, preparatem w postaci lakieru. Do tego celu służą lakiery fluorowe. Są one lepkie, co powoduje lepsze i dłuższe przyleganie do wszystkich powierzchni zęba.',
                    'price'=> 50
                ],
                [
                    'name' => 'Lakowanie zębów', 'description' => 'Lakowanie to zabieg wypełniania bruzd i zagłębień na powierzchniach żujących zębów trzonowych i przedtrzonowych. Jest sprawdzoną metodą zapobiegania próchnicy zębów, prawie w 100% chroni przed tą chorobą. Lakowanie polega na oczyszczeniu bruzdy, a następnie zalaniu jej specjalistycznym lakiem. ',
                    'price'=> 75
                ],
                [
                    'name' => 'Przegląd zębów', 'description' => 'Badanie jamy ustnej',
                    'price'=> 30
                ],

            ],
            'name'
        );
    }
}
