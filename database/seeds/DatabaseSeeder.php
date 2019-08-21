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
         $this->call(UsersSeeder::class);
         $this->call(ProceduresTableSeeder::class);
         $this->call(SurgeryClassificationTableSeeder::class);
         $this->call(AnestheticsTableSeeder::class);
         $this->call(StatusTableSeeder::class);
    }
}
