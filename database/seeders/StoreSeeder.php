<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$user = User::where('name', 'Admin')->get();
        //$userId = $user->id;
        Store::factory(1)->make([
            'name' => 'CrisLaços',
            'description' => 'Laços Maravilhosos para lhes enfeitar',
            'user_id' => $user,
        ]);*/
        $stores = Store::all();
        foreach ($stores as $store) {
            for ($i = 0; $i < 40; $i++) {
                $store->products()->save(Product::factory()->make());
            }
        }
    }
}
