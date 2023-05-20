<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Repositories\TransactionRepository;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 10;

        return view('admin.transaction.index',[
            'title'         => 'Transaction List',
            'transactions'  => $this->transactionRepository->index($perPage),
            'page'          => $request->page ?? 1,
            'per_page'      => $perPage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title']           = 'Add New Transaction';
        $data['active_accounts'] = $this->transactionRepository->getActiveAccounts();
        return view('admin.transaction.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_id'       =>'required',
            'type'             =>'required',
            'transaction_date' => 'required|date|before_or_equal:'.date('d-M-Y'),
            'amount'           => 'required|numeric|gt:0'
        ]);

        DB::beginTransaction();
        try {

            $this->transactionRepository->store($request->all());
            
        } catch (Throwable $th) {
            DB::rollback();

            session()->flash('message','Transaction Error');
            return redirect()->route('transaction.index');
        }
        DB::commit();

        session()->flash('message','Transaction completed successfully');
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit', [
            'title'             => 'Edit Transaction',
            'active_accounts'   => $this->transactionRepository->getActiveAccounts(),
            'transaction'       => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'account_id'       =>'required',
            'type'             =>'required',
            'transaction_date' => 'required|date|before_or_equal:'.date('d-M-Y'),
            'amount'           => 'required|numeric|gt:0'
        ]);

        DB::beginTransaction();
        try {

            $this->transactionRepository->update($request->all(), $transaction);
            
        } catch (Throwable $th) {
            DB::rollback();

            session()->flash('message','Transaction Error');
            return redirect()->route('transaction.index');
        }
        DB::commit();

        session()->flash('message','Transaction updated successfully');
        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        DB::beginTransaction();
        try {
            $this->transactionRepository->delete($transaction);
        } catch (Throwable $th) {
            DB::rollback();
            return redirect()->route('customers.index');
        }
        DB::commit();
        
        session()->flash('message','Transaction deleted successfully');
        return redirect()->route('transaction.index');
    }
}
