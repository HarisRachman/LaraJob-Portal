<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [
        [
            'type_name' => 'Freelance'
        ],
        [
            'type_name' => 'Paruh Waktu / Part Time'
        ],
        [
            'type_name' => 'Tetap'
        ],
        [
            'type_name' => 'Kontrak'
        ],
        [
            'type_name' => 'Purna Waktu / Full Time'
        ],
        [
            'type_name' => 'Magang'
        ],
        [
            'type_name' => 'Temporary'
        ]
    ];

    public function run()
    {
        foreach($this->data as $val) {
            JobType::create($val);
        }
    }
}
