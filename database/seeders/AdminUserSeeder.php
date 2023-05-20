<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();

        User::create([
            'id'        => 101,
            'name'      => 'Md. Shariful Alam',
            'email'     => 'admin@dongyi.com',
            'password'  => bcrypt('12345678')
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
