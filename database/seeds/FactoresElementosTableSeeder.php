<?php

use Illuminate\Database\Seeder;

class FactoresElementosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = collect([
            ['factor_elemento' => 75, 'elemento_id' => 1],
            ['factor_elemento' => 10, 'elemento_id' => 2],
            ['factor_elemento' => 15, 'elemento_id' => 3],
            ['factor_elemento' => 50, 'elemento_id' => 4],
            ['factor_elemento' => 50, 'elemento_id' => 5],
        ]);

        $collection->each(function ($item) {

            factory(App\FactorElemento::class)->create([
                'factor_elemento' => $item['factor_elemento'],
                'elemento_id'     => $item['elemento_id'],
            ]);
        });
    }
}
