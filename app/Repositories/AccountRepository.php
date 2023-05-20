<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Throwable;

class AccountRepository
{
    public function index($perpage)
    {
        try {
            $accounts = Account::orderBy('id', 'ASC')->paginate($perpage);
            return $accounts;
        } catch (Throwable $th) {
            throw $th;
        }
    }
}

