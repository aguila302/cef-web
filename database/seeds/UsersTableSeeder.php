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
        $this->creaUsuarioAdmin();
        factory(App\User::class, 10)->create();
    }

    public function creaUsuarioAdmin()
    {
        factory(App\User::class)->create([
            'name'           => 'Administrador',
            'email'          => 'admin@calymayor.com.mx',
            'username'       => 'admin',
            'password'       => bcrypt('develop'),
            'remember_token' => str_random(10),
        ]);
    }
}
