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

        $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');

        $user_admin = factory(User::class)->create([
            'name' => 'Nicolás Dalmás',
            'email' => 'ndalmas9@gmail.com',
            'password' => bcrypt('nicolas92'),
            'profession_id' => $professionId,

        ]);
            $user_admin->roles()->attach($role_admin);

        

        $users = factory(User::class, 48)->create([
            'profession_id' => App\Profession::all()->random()->id,
            
        ]);

        foreach ($users as $user) {
            $user->roles()->attach($role_user);
            
        }

    }
}
