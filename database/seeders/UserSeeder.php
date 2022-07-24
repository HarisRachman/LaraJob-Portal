<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data = [

        [
            'role_id' => '1',
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret
        ],
        [
            'role_id' => '2',
            'name' => 'Perusahaan',
            'email' => 'perusahaan@mail.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret
        ],
        [
            'role_id' => '3',
            'name' => 'Pelamar',
            'email' => 'pelamar@mail.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', //secret
        ]
    ];
    
    public function run()
    {
        array_map(function($item) {
            User::create($item);
        }, $this->data);
    }
}
