<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
            [
                'first_name' => 'Mike',
                'last_name' => 'Smith',
                'email' => "mikesmith@example.com",
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // password
                'remember_token' => Str::random(10),
            ]
        );
    }
}
