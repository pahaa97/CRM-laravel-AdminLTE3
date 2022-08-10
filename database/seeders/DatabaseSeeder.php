<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
//         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
         ]);

         $models = 10001;

        \App\Models\Company::factory()->count($models)->create();
        \App\Models\Client::factory()->count($models)->create()
            ->each(function ($client) {
                $arr = [];
                while (count($arr) <= rand(1,20)) {
                    $arr[] = rand(1,10001);
                }
                $company = \App\Models\Company::find($arr);

                $client->companies()->attach($company);
            });
    }
}
