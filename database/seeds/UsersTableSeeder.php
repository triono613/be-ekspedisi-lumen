<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Triono',
            'identity_id' => '12345678345',
            'gender' => 1,
            'address' => 'Jl Sultan Hasanuddin',
            // 'photo' => 'daengweb.png', //note: tidak ada gambar
            'email' => 'triono.triono1@gmail.com', 
            'password' => app('hash')->make('123456'),
            'phone_number' => '089508611088',
            'api_token' => Str::random(40),
            'role' => 0,
            'status' => 1
        ]);
    }
}
