<?php

use App\User;
use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE professions RESTART IDENTITY CASCADE');
//        DB::insert('INSERT INTO professions (title) VALUES (:title)', [
//            'title' => 'Desarrollador back-end',
//        ]);

//        DB::table('professions')->insert([
//            'title' => 'Desarrollador back-end',
//        ]);

        Profession::create([
            'title' => 'Desarrollador back-end',
        ]);

        Profession::create([
            'title' => 'Desarrollador front-end',
        ]);

        Profession::create([
            'title' => 'Diseñador web',
        ]);

        factory(Profession::class)->times(3)->create();


    }
}
