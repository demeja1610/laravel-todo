<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
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
        $raw_roles = RolesEnum::getConstants();

        if(!empty($raw_roles)) {
            foreach($raw_roles as $raw_role) {
                $role = Role::create(['name' => $raw_role['name']]);

                $role->syncPermissions($raw_role['permissions']);
            }
        }
    }
}
