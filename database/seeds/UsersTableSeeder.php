<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->crearRoles();
        $this->creaUsuarioAdmin();
        factory(App\User::class, 10)->create();
    }

    public function creaUsuarioAdmin()
    {
        $userAdmin = factory(App\User::class)->create([
            'name'           => 'Administrador',
            'email'          => 'admin@calymayor.com.mx',
            'username'       => 'admin',
            'password'       => bcrypt('develop'),
            'remember_token' => str_random(10),
        ]);
        $userAdmin->assignRole('admin');

    }

    public function crearRoles()
    {
        $role = Role::create(['name' => 'admin']);
    }
}
