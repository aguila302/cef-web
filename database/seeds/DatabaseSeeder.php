<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AutopistasTableSeeder::class);
        $this->call(CuerposTableSeeder::class);
        $this->call(ElementosGeneralCaminoTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AutopistasUsersTableSeeder::class);
        $this->call(ValoresPonderadosTableSeeder::class);
        $this->call(ElementosTableSeeder::class);
        $this->call(FactoresElementosTableSeeder::class);
        $this->call(DefectosTableSeeder::class);
        $this->call(IntensidadesTableSeeder::class);
        $this->call(RangosTableSeeder::class);
        $this->call(TramosTableSeeder::class);
    }
}
