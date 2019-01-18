<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@admin.com.br',
            'password' => bcrypt('secret')            
        ]);
        
        factory(App\User::class, 5)->create();
    }
}
