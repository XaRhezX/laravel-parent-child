<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [1, 'Budi', 'Male', null],
            [2, 'Dedi', 'Male', 1],
            [3, 'Dodi', 'Male', 1],
            [4, 'Dede', 'Male', 1],
            [5, 'Dewi', 'Female', 1],

            [6, 'Feri', 'Male', 2],
            [7, 'Farah', 'Female', 2],

            [8, 'Gugus', 'Male', 3],
            [9, 'Gandi', 'Male', 3],

            [10, 'Hani', 'Female', 4],
            [11, 'Hana', 'Female', 4],
        ];

        foreach ($data as $v) {
            Family::create([
                'id' => $v[0],
                'name' => $v[1],
                'gender' => $v[2],
                'family_id' => $v[3],
            ]);
        }
    }
}
