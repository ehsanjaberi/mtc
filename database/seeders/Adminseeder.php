<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        return User::create([
            'CodePrsn' =>'97121055111005',
            'Fname' => 'ehsan',
            'Lname' => 'jaberi',
            'CodeNational' => '0640549225',
            'username' => 'ehsanjaberi',
            'password' => Hash::make('12121212'),
        ]);
    }
}
