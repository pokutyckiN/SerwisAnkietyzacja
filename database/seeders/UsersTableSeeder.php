<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();

        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $adminRole = Role::where('name', 'admin')->first();
        $profesorsRole = Role::where('name', 'profesors')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin')
        ]);

        $profesors = User::create([
            'name' => 'Profesor',
            'email' => 'profesor@profesor.com',
            'password' => Hash::make('profesorprofesor')
        ]);

        $user = User::create([
            'name' => 'Student',
            'email' => 'student@student.com',
            'password' => Hash::make('studentstudent')
        ]);

        $admin->roles()->attach($adminRole);
        $profesors->roles()->attach($profesorsRole);
        $user->roles()->attach($userRole);
    }
}
