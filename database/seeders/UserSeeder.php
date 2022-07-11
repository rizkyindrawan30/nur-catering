<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
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
        User::create([
            'name' => "Rizky Indrawan Purwanto",
            'email' => "rizkypurwanto30@gmail.com",
            'gender' => '1',
            'password' => bcrypt("Indrawan"),
        ]);

        Admin::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'gender' => '1',
            'password' => bcrypt("Indrawan"),
        ]);
    }
}
