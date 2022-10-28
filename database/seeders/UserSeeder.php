<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'praiseatmosphere@admin.com',
            'name' => 'Praise Atmosphere',
            'email_verified_at' => now(),
            'password' => Hash::make('OwnerAdmin@2022'),
        ]);
    }
}
