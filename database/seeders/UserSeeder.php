<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'name' => 'Admin da Loja',
            'email' => 'admin@loja.com',
            //'password' => '123456'
        ])->each(function ($user) {
            $user->store()->save(Store::factory()->make([
                'name' => 'CrisLaços',
                'description' => 'Laços Maravilhosos para lhes enfeitar',
            ]));
        });
        User::factory(1)->create([
            'name' => 'Comprador da Loja',
            'email' => 'comprador@loja.com',
            //'password' => '123456'
        ]);
        User::factory(40)->create()->each(function ($user) {
            $user->store()->save(Store::factory()->make());
        });
    }
}
