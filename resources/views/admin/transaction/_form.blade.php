        @csrf
        
        <div class="form-group">
            @php
                if(old('account_id')){
                    $account_id = old('account_id');
                }elseif(isset($transaction)){
                    $account_id = $transaction->account_id;
                }else{
                    $account_id = null;
                }
            @endphp
            
            <label for="course_id">Account Name</label>
            <select name="account_id" id="account_id" class="selectpicker form-control form-control-line @error('account_id') is-invalid @enderror"  data-live-search="true">
                @foreach ($active_accounts as $account)
                    <option {{ ($account_id == $account->id )? 'selected':'' }} value="{{ $account->id }}" >{{ $account->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="default">Transaction Type</label>
            @php
                if(old('type')){
                    $type = old('type');
                }elseif(isset($transaction)){
                    $type = $transaction->type;
                }else{
                    $type = null;
                }
            @endphp
            <br>
            <input name="type" @if($type == 1) checked @endif type="radio" value=1 id="deposit" >
            <label for="deposit">Deposit</label> &nbsp;&nbsp;&nbsp;
            <input name="type" @if($type == 2) checked @endif type="radio" value=2 id="withdraw" >
            <label for="withdraw">Withdraw</label>
        </div>

        <div class="form-group">
            <label for="name">Transaction date</label>
            <input name="transaction_date" id="transaction_date" type="date" required value="{{ old('transaction_date',isset($transaction)?$transaction->date:date('Y-m-d')) }}" class="form-control @error('transaction_date') is-invalid @enderror">
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input name="amount" id="amount" type="number" placeholder="1.0" step="0.01" min="0" required value="{{ old('amount',isset($transaction)?$transaction->amount:'0.00') }}" class="form-control @error('amount') is-invalid @enderror">
        </div>

