<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Interest;
use App\Models\Music;
use App\Models\MusicHistory;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitDB extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Music::insert([
            ['name' => 'NEW WAVE', 'artist' => 'The Black Eyed Peas', 'description' => '', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Basketball Shoes', 'artist' => 'Black Country', 'description' => '', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'keisha', 'artist' => 'Yaya Bey', 'description' => '', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Last Last', 'artist' => 'Burna Boy', 'description' => '', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Transparent Soul', 'artist' => 'Willow feat. Travis Barker', 'description' => '', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Interest::insert([
            ['name' => 'Pop music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Classical music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jazz music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ethnic music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rock music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alternative music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Heavy metal music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blues music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Folk music', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Eclectic music', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Genre::insert([
            ['name' => 'Pop', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rock', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jazz', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blues', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Country', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Classical', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hip hop', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Electronic dance music (EDM)', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Folk', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Heavy metal', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $faker = Factory::create('ms_MY');
        $users = [
            ['name' => $faker->name, 'email' => $faker->email, 'password' => bcrypt('abcd1234'),],
            ['name' => $faker->name, 'email' => $faker->email, 'password' => bcrypt('abcd1234'),],
            ['name' => $faker->name, 'email' => $faker->email, 'password' => bcrypt('abcd1234'),],
            ['name' => $faker->name, 'email' => $faker->email, 'password' => bcrypt('abcd1234'),],
            ['name' => $faker->name, 'email' => $faker->email, 'password' => bcrypt('abcd1234'),]
        ];

        foreach ($users as $user) {
            $user = User::create($user);

            //genre
            $loop = $faker->numberBetween(1,10);
            $ids = [];
            for($x = 1; $x<$loop; $x++){
                $ids[] = $faker->numberBetween(1,10);
            }
            $ids = array_unique($ids);

            $user->genres()->sync($ids);
            $user->interests()->sync($ids);

            $loop = $faker->numberBetween(1,20);

            for($x = 1; $x<$loop; $x++){
                MusicHistory::create([
                    'user_id' => $user->id,
                    'music_id' => $faker->numberBetween(1,5)
                ]);
            }
        }
    }
}
