<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $user = [
            [
                'name'  => 'Nadila Zumitia Putri',
                'role'  => 'admin'
            ],
            [
                'name'  => 'Adha Dont Differatama'
            ]
        ];

        $credentials = [
            [
                'user_id'   => '1',
                'username'  => 'nadila',
                'password'  => password_hash('123456', PASSWORD_DEFAULT)
            ],
            [
                'user_id'   => '2',
                'username'  => 'ADDFa',
                'password'  => password_hash('123456', PASSWORD_DEFAULT)
            ]
        ];

        for ($i = 0; $i < count($user); $i++) {
            $this->db->table('users')->insert($user[$i]);
            $this->db->table('credentials')->insert($credentials[$i]);
        }
    }
}
