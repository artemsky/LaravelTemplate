<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Ultraware\Roles\Models\Role;

class UsersSeeder extends Seeder
{

    private $env = [
        'local',
        'development',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (in_array(config('app.env'), $this->env)) {
            if (!User::where('email', 'root@user.test')->exists()) {
                $rootRole = Role::where('name', 'root')->first();

                $rootUser = User::create([
                    'name' => 'root',
                    'email' => 'root@user.test',
                    'password' => bcrypt('10101010'),
                ]);

                $rootUser->attachRole($rootRole);
            }

            if (!User::where('email', 'client@user.test')->exists()) {
                $clientRole = Role::where('name', 'client')->first();

                $clientUser = User::create([
                    'name' => 'client',
                    'email' => 'client@user.test',
                    'password' => bcrypt('10101010'),
                ]);

                $clientUser->attachRole($clientRole);
            }
        }
    }
}
