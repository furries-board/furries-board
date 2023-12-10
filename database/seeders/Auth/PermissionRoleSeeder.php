<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        // Create Roles
        Role::create([
            'id' => 1,
            'name' => 'Administrator',
        ]);

        /**
         * Non Grouped Permissions
         */

        /**
         * Grouped permissions
         * Users category
         */
        $users = Permission::create([
            'name' => 'admin.access.user',
            'description' => 'All User Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'name' => 'admin.access.user.list',
                'description' => 'View Users',
            ]),
            new Permission([
                'name' => 'admin.access.user.deactivate',
                'description' => 'Deactivate Users',
            ]),
            new Permission([
                'name' => 'admin.access.user.reactivate',
                'description' => 'Reactivate Users',
            ]),
            new Permission([
                'name' => 'admin.access.user.clear-session',
                'description' => 'Clear User Sessions',
            ]),
            new Permission([
                'name' => 'admin.access.user.impersonate',
                'description' => 'Impersonate Users',
            ]),
            new Permission([
                'name' => 'admin.access.user.change-password',
                'description' => 'Change User Passwords',
            ]),
        ]);

        /**
         * Assign Permissions to other Roles
         */
        $this->enableForeignKeys();
    }
}
