<?php

namespace App\Repositories;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class TransactionRepository
{
    public function index($perpage)
    {
        try {
            $transactions = Transaction::with(['created_by_user','account'])->latest('id')->paginate($perpage);
            return $transactions;
        } catch (Throwable $th) {
            throw $th;
        }
    }

    public function store(array $data)
    {
        DB::beginTransaction();
        try {

            Transaction::create([
                'account_id'   => $data['account_id'],   
                'type'         => $data['type'],
                'date'         => $data['transaction_date'], 
                'amount'       => $data['amount'],
                'created_by'   => Auth::user()->id
            ]);

            $account = Account::findOrFail($data['account_id']);
            if($data['type'] == 1)
            {
                $account->balance = $account->balance + $data['amount'];
            }
            elseif($data['type'] == 2)
            {
                $account->balance = $account->balance - $data['amount'];
            }
            else{
                $account->balance = $account->balance;
            }            
            
            $account->save();
    
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return true;
    }

    public function update(array $data, $transaction)
    {
        DB::beginTransaction();
        try {

            $transaction->account_id    = $data['account_id'];
            $transaction->type          = $data['type'];
            $transaction->date          = $data['transaction_date'];
            $transaction->amount        = $data['amount'];
            $transaction->updated_by    = Auth::user()->id;
            $transaction->save();

            $account                    = Account::findOrFail($data['account_id']);
            $amount_difference          = $data['amount'] - $account->balance;
            if($data['type'] == 1)
            {
                $account->balance = $account->balance + $amount_difference;
            }
            elseif($data['type'] == 2)
            {
                $account->balance = $account->balance - $amount_difference;
            }
            else{
                $account->balance = $account->balance;
            }                        
            $account->save();
    
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return true;
    }

    public function delete($transaction)
    {
        DB::beginTransaction();
        try {
            $transaction->delete();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        DB::commit();
        return true;
    }

    public function getActiveAccounts()
    {
        try {
            $active_accounts = Account::where('status','=',1)->orderBy('id', 'ASC')->get();
            return $active_accounts;
        } catch (Throwable $th) {
            throw $th;
        }
    }
}

