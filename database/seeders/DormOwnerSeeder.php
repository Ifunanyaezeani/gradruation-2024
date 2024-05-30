<?php

namespace Database\Seeders;

use App\Models\DormOwner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DormOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DormOwner::create([
            'first_name' => "Kyle",
            'last_name' => "Samson",
            'email' => "test1234@gmail.com",
            'password' => Hash::make('test1234')
        ]);
    }
}
