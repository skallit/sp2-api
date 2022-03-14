<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Traits\Seedfield;
use Database\Seeders\Traits\Truncatable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use Truncatable,Seedfield;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstName' => 'Visiteur',
            'lastName' => 'Safi',
            'email' => 'visiteur01@safi.com',
            'password' => Hash::make('pwsio')
        ]);
    }
}
