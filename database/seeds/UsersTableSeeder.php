<?php

use Illuminate\Database\Seeder;
use App\Role;
Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('role_name', 'admin')->first();
        $agentRole = Role::where('role_name', 'agent')->first();
        $customerRole = Role::where('role_name', 'customer')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
            ]);

            $agent = User::create([
                'name' => 'Agent User',
                'email' => 'agent@agent.com',
                'password' => Hash::make('password')
                ]);
                
                $customer = User::create([
                    'name' => 'Customer User',
                    'email' => 'customer@customer.com',
                    'password' => Hash::make('password')
                    ]); 

        $admin->roles()->attach($adminRole);
        $agent->roles()->attach($agentRole);
        $customer->roles()->attach($customerRole);
    }
}
