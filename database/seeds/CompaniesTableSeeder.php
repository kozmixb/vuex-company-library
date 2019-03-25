<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('companies')->delete();

        factory(App\Company::class,10)->create()->each(function($c){
            $c->employees()
                ->saveMany(
                    factory(App\Employee::class,rand(1,5))->make()
                );
        });
    }
}
