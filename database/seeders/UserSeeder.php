<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->seedAdminUser();
        $this->seedNonAdminUsers();
    }

    /**
     * @return void
     */
    public function seedAdminUser(): void
    {
        $this->seeding($this->adminUserDetails());
    }

    /**
     * @return void
     */
    public function seedNonAdminUsers(): void
    {
        $this->seeding($this->nonAdminUserDetails(), false);
    }

    /**
     * @param  array  $data
     * @param  bool  $isAdmin
     * @return void
     */
    public function seeding(array $data, bool $isAdmin = true): void
    {
        foreach ($data as $users) {
            $user = User::factory()->create(
                [
                    'first_name'        => $users['first_name'],
                    'last_name'         => $users['last_name'],
                    'cellphone'         => $users['cellphone'],
                    'age'               => $users['age'],
                    'email'             => $users['email'],
                    'password'          => $users['password'],
                    'email_verified_at' => Carbon::now(),
                ]
            );

            if ($isAdmin) {
                //Assign Admin Permissions

                $user->assignRole('admin');
                $user->givePermissionTo(['admin', 'administer-user-permissions', 'view-admin-dashboard']);
            }
        }
    }



    /**
     * @return array[]
     */
    private function adminUserDetails(): array
    {
        return [
            [
                'first_name'        => 'Admin',
                'last_name'         => 'User',
                'cellphone'         => '083456867',
                'age'               => '33',
                'email'             => 'admin@user.com',
                'password'          => Hash::make('secret99'),
                'email_verified_at' => Carbon::now(),
            ],
        ];
    }

    /**
     * @return array[]
     */
    private function nonAdminUserDetails(): array
    {
        $nonAdmins = array();

        for ($i = 0; $i < 100; $i++) {
            $nonAdmins[] = [
                'first_name'        => fake()->firstName,
                'last_name'         => fake()->lastName,
                'cellphone'         => '0' . fake()->randomNumber(9, true),
                'age'               => fake()->numberBetween(18,80),
                'email'             => fake()->unique()->safeEmail(),
                'password'          => Hash::make('secret99'),
                'email_verified_at' => Carbon::now(),
            ];
        }
        return $nonAdmins;
    }
}
