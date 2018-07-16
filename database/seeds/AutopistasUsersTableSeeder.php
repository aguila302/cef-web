<?php

use App\Autopista;
use App\User;
use Illuminate\Database\Seeder;

class AutopistasUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $autopista = Autopista::get()->take(rand(1, 10));
        User::each(function ($user) use ($autopista) {
            $user->asignaAutopista($autopista);
        });
    }
}
