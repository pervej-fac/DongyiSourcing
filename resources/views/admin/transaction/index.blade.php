@extends('layouts.back.master')
@section('content')
    <div class="row">
        <br>
        @include('layouts.back._messages')
        <div class="col-lg-12">
            <h1 class="page-header">{{ $title }}</h1>
            <a href="{{ route('transaction.create') }}" class="btn btn-sm btn-default btn-primary" style="margin-left:-15px; margin-bottom: 10px;">Add Transaction</a>
        </div>
        <!-- /.col-lg-12 -->
    <!-- </div> -->
    <br>

    <div>
    <table class="table table-striped table-bordered table-hover mt-1">
        <thead>
        <tr>
            <th>#</th>
            <th>Account Name</th>
            <th>Transaction Type</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Processed By</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($transactions as $key=>$transaction )
                <tr>
                    <td>{{((($page-1)*$per_page)+($key + 1))}}</td>
                    <td>{{ $transaction->account->name }}</td>
                    <td>{{ ($transaction->type == 1 ? 'Deposit' : ($transaction->type == 2 ? 'Withdraw' : '--'))}}</td>
                    <td>{{ date('d-M-Y', strtotime($transaction->date)) }}</td>
                    <td class="text-right">{{ $transaction->amount }}</td>
                    <td>{{ $transaction->created_by_user->name }}</td>
                    <td>
                       <a class="btn btn-sm btn-outline btn-primary" href="{{ route('transaction.edit',$transaction->id) }}">Edit</a>
                       <form style="display: inline;" method="post" action="{{ route('transaction.destroy',$transaction->id) }}">
                           @csrf
                           @method('delete')
                           <button class="btn btn-sm btn-outline btn-danger" onclick="return confirm('Are you confirm to delete?')">Delete</button>
                       </form>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <br>
    <div id="pagination">
        @if($transactions->count() > 0)
            @include('admin.common.pagination', ['data'=> $transactions])
        @endif
    </div>
    
    </div>
@endsection
                            
@push('custom-css')
    <style>
        #pagination nav div span{
            padding: 7px;
            margin-right: 10px;
            color:black;
            border: 1px solid black;
            border-radius: 5px;
        }
        #pagination nav div a{
            text-decoration: none;
            padding: 7px 20px;
            margin-left: 10px;
            color:black;
            border: 1px solid black;
            border-radius: 5px;
        }
        #perpage{
            height: 30px;
            border-radius: 5px;
        }
    </style>
@endpush




@push('library-js')

@endpush



@push('custom-js')
    <script>
        let index_url = "{{route('transaction.index')}}";
        $(document).ready(function() {
            $('#perpage').on('change', function() {
                let val = $('#perpage').val();
                window.location.href = index_url + '?per_page=' + val;
            });

            $('#goto').keyup(
                function(event) {
                    var code = event.keyCode ? event.keyCode : event.which;
                    var page = document.getElementById("goto").value;
                    var lastPage = '{{ $transactions->lastPage() }}';
                    

                        
                    if (code == 13) {
                        
                        if (parseInt(page) > parseInt(lastPage)) {
                            page = lastPage;
                        }
                        // ajaxTable(pagenum);
                        window.location.href = "{{ route('transaction.index') }}" +'?per_page={{ $per_page }}&page=' + page;
                    }
                }
            );
        });
    </script>
@endpush