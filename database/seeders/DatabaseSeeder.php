<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Worker;
use App\Models\Citizen;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // roles
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'worker']);
        $role3 = Role::create(['name' => 'medic']);

        $now = now();
        \App\Models\Purok::insert([
            ['name' => 'Purok 1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Purok 2', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Purok 3', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Purok 4', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Purok 5', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Purok 6', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Purok 7', 'created_at' => $now, 'updated_at' => $now],
        ]);

        \App\Models\Household::factory(10)->create();
        \App\Models\Citizen::factory(100)->create();

        $admin = User::factory(['username' => 'admin', 'password' => Hash::make('admin123')])->create();
        $admin->assignRole($role1);

        $worker = User::factory(['username' => 'worker', 'password' => Hash::make('worker123')])->create();
        $worker->assignRole($role2);

        $medic = User::factory(['username' => 'medic', 'password' => Hash::make('medic123')])->create();
        $medic->assignRole($role3);


    }
}
