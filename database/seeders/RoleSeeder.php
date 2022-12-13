<?php

namespace Database\Seeders;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //Create roles
        foreach(config('custom.permissions.roles') as $item) {
            $role = Role::firstOrCreate([
                'name'       => $item,
                'guard_name' => 'web'
            ]);

            if ($item == 'Admin') {
                $role->givePermissionTo(config('custom.permissions.groups.admin'));
            }

            if ($item == 'Content Manager') {
                $role->givePermissionTo(config('custom.permissions.groups.content-manager'));
            }

        }
    }
}
