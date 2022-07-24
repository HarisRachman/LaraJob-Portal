<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [
        [
            'role_name' => 'Admin'
        ],
        [
            'role_name' => 'Perusahaan'
        ],
        [
            'role_name' => 'Pelamar'
        ]
    ];

    public function run()
    {
        foreach($this->data as $val) {
            Role::create($val);
        }
    }
}
