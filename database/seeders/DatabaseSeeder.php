<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
    
          
          \App\Models\User::factory(10)->create();
        

        User::create([
            'name' =>'test',
            'email' =>'test@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'user',
            'phone_number'=>'123456789',
            'address'=>'12342321312312',
            'profile_image' =>'defaultuser.jpeg'
        ]);
        User::create([
            'name' =>'admin',
            'email' =>'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'phone_number'=>'123456789',
            'address'=>'12342321312312',
            'profile_image' =>'defaultuser.jpeg'
        ]);

        DB::table('food')->insert([
            [
                'item_name' => 'Peach Gum', 'bdesc'=>'PeachGum', 'desc' => 'Peach Gum', ''
            ],
            [

            ]
        ]);
    }
}
