<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enum\RolesEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $users;

    public function __construct()
    {
        $this->users = [
            'admin' => [
                'credentials' => [
                    'name' => 'Админ Админович',
                    'email' => 'admin@laraveltodo.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ],
                'role' => RolesEnum::admin['name'],
            ],
        ];
    }

    public function run()
    {
        $users = User::factory(10)->create()->each(function ($user) {
            $user->assignRole(RolesEnum::user['name']);
        });

        foreach($this->users as $raw_user) {
            $user = new User($raw_user['credentials']);
            $user->save();

            $user->assignRole($raw_user['role']);
        }
    }
}
