<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'Ibiapina descartaveis',
            'email' => 'ibiapina@servidor.com',
            'password' => bcrypt('senha123'),
            ],
        ];
        foreach ($users as $user) {
            \App\User::create([
               'name' => $user['name'],
               'email' => $user['email'],
               'password' => $user['password']
           ]);
       }
    }
}
