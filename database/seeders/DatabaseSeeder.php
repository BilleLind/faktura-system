<?php

namespace Database\Seeders;

use Faker;
use App\Models\User;
use App\Models\ordre;
use App\Models\Faktura;
use App\Models\Produkt;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user_1 = User::create([
            'navn' => $faker->name(),
            'email' => $faker->email(),
            'password' => 'randompassword',
            'addresse' => $faker->address(),
            'tlf' => $faker->phoneNumber() 
        ]);

        $produkt_eksempel_1 = Produkt::create([
            'titel' => $faker->word(),
            'description' => $faker->sentence(),
            'pris' => $faker->numberBetween(15,500),
        ]);
        $produkt_eksempel_2 = Produkt::create([
            'titel' => $faker->word(),
            'description' => $faker->sentence(),
            'pris' => $faker->numberBetween(15, 500),
        ]);
        $produkt_eksempel_3 = Produkt::create([
            'titel' => $faker->word(),
            'description' => $faker->sentence(),
            'pris' => $faker->numberBetween(15, 500),
        ]);

        $order_eksempel = ordre::create([
            'status' => 'igangværende',
            'total_pris' => 120,
            'moms' => 25,
            'fragt' => $faker->randomNumber(2),
            'user_id' => $user_1->id
        ]);

        $order_eksempel->produkter()->attach($produkt_eksempel_1, ['kvantitet' =>2]);
        $order_eksempel->produkter()->attach($produkt_eksempel_2);
        $order_eksempel->produkter()->attach($produkt_eksempel_3);




        $faktura_eksempel = Faktura::create([
            'status' => 'betalt',
            'skabt' => now(),
            'total_pris' => $faker->randomNumber(3),
            'til_firma' => $faker->word(),
            'til_addresse' => $faker->address(),
            'til_cvr' => $faker->word(),
            'ordre_id' => $order_eksempel->id
        ]);
    }
}
