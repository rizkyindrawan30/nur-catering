<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id' => 1,
            'name' => 'Kadek Candra Ulihantari',
            'email' => 'kcandraulihantari30@gmail.com',
            'gender' => '2',
            'password' => bcrypt('Marettemukus'),
        ]);

        Admin::create([
            'id' => 2,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'gender' => '1',
            'password' => bcrypt('Marettemukus'),
        ]);
    }
}
