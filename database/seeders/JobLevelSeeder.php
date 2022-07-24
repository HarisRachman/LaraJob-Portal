<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobLevel;

class JobLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [
        [
            'joblevel_name' => 'Fresh Graduate'
        ],
        [
            'joblevel_name' => 'Pegawai (non-manajemen & non-supervisor)'
        ],
        [
            'joblevel_name' => 'Supervisor/Koordinator'
        ],
        [
            'joblevel_name' => 'Manajer/Asisten Manajer'
        ]
    ];

    public function run()
    {
        foreach($this->data as $val) {
            JobLevel::create($val);
        }
    }
}
