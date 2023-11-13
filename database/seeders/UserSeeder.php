<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            //'id'=>2,
            'username'     => 'hossam',
            'email'    => 'admin2@admin.com',
            'password' => bcrypt('010101'), 
            'user_type'=>'admin'

        ]);

        
    }
}
