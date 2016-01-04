<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeCommerce\User', 15)->create();

        \CodeCommerce\User::create([
            'name' => "Nilton",
            'email' => "nilton@schoolofnet.com",
            'password' => \Illuminate\Support\Facades\Hash::make(123456),
            'is_admin' => 1,
            'cep' => "45690000",
            'address' => "Rua teste",
            'district' => "Centro",
            'city' => "Ilhéus",
            'state' => "Bahia",
        ]);
    }
}