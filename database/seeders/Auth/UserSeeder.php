<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run(): void
    {
        $this->disableForeignKeys();

        if (app()->environment([
            'local',
            'testing',
        ])) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'active' => true,
            ]);

            User::create([
                'name' => 'Test User',
                'email' => 'user@user.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'active' => true,
            ]);
        }

        $this->enableForeignKeys();
    }
}
