<?php

use App\User;
use App\Role;
use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$professions = DB::select('SELECT id FROM professions WHERE title = ?', ['Desarrollador back-end']);
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        //$professionId = Profession::where('title', 'Desarrollador back-end')->value('id');
        $professionId = Profession::all();
        $user_admin = factory(User::class)->create([
            'name' => 'Nicolás Dalmás',
            'email' => 'ndalmas9@gmail.com',
            //'phone' => '153796796',
            //'address' => 'Francia 4731',
            'password' => bcrypt('nicolas123'),
            'profession_id' => '3',

        ]);
        
        $user_admin->roles()->attach($role_admin);

        

        $users = factory(User::class, 47)->create([
            'profession_id' => $professionId->random()->id,
            
        ]);

        foreach ($users as $user) {
            $user->roles()->attach($role_user);
            
        }

    }
}