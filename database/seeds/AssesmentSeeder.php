<?php

use Illuminate\Database\Seeder;

class AssesmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Assesment::class,20)->create();
    }
}
