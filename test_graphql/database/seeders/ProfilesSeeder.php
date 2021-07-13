<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i =1; $i <= 5; $i++){
            DB::table('profiles')->insert([
                // 'user_id' => Str::random(10),
                'first_name' => Str::random(10),
                'last_name' => Str::random(50),
                'address' => Str::random(10)
            ]);
    }
}

}
