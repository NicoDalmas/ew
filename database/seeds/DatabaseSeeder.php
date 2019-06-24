<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'users',
            'professions',
            'roles',
            'role_user'

        ]);

        // $this->call(UsersTableSeeder::class);
        $this->call(ProfessionSeeder::class);
        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleTableSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);
        $this->call(UserSeeder::class);
    }

    protected function truncateTables(array $tables)
    {
       //comento las sgtes lineas pq sólo funcionan con mysql, y no funcionan con pgsql.
       // DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::statement('TRUNCATE TABLE professions RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE roles RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE users RESTART IDENTITY CASCADE');



    /*    foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

    */   
       //DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}