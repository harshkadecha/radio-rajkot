<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = new User();
        // $user->name = "Super Admin";
        // $user->email = "superadmin@admin.com";
        // $user->password = Hash::make('123456');
        // $user->created_at =  Carbon::now();
        // $user->updated_at = Carbon::now();
        // $user->save();

        $role = new Role;
        $role->name = 'super_admin';
        $role->guard_name = 'web';
        $role->save();


        $role = Role::where('name', 'super_admin')->first();
        $role->givePermissionTo(Permission::all());

        $user = User::all()->where('email','superadmin@admin.com')->first();
        $user->assignRole('super_admin');

    }
}
