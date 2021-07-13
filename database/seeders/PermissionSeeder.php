<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raw_permissions = PermissionsEnum::getConstants();

        if(!empty($raw_permissions)) {
            foreach($raw_permissions as $raw_permission) {
                Permission::create(['name' => $raw_permission]);
            }
        }
    }
}
