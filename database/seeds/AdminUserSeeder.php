<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            'name'              => 'Admin',
            'email'             => 'jamil.semiotify@gmail.com',
            'password'          => Hash::make('jamil123'),
            'set_password'      => true,
            'is_email_verified' => true,
            'is_active'         => true,
        ];

        User::create($input);
    }
}
