<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Account::truncate();

        for($i=1; $i<=100; $i++)
        {
            Account::create([
                'name'          => 'Sample Account '.$i,
                'balance'       => random_int(10000, 50000),
                'status'        => 1,
                'created_by'    => 101
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
