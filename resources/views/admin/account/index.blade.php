@extends('layouts.back.master')
@section('content')
    <div class="row">
        <br>
        @include('layouts.back._messages')
        <div class="col-lg-12">
            <h1 class="page-header">{{ $title }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    <!-- </div> -->
    <br>
    <div>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Account Name</th>
            <th>Balance</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
            @foreach($accounts as $key=>$account )
                <tr>
                    <td>{{((($page-1)*$per_page)+($key + 1))}}</td>
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->balance }}</td>
                    <td>{{ $account->status == 1 ? 'Active' : 'Inactive' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <br>
    <div id="pagination">
        @if($accounts->count() > 0)
            @include('admin.common.pagination', ['data'=> $accounts])
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
        let index_url = "{{route('account.index')}}";
        $(document).ready(function() {
            $('#perpage').on('change', function() {
                let val = $('#perpage').val();
                window.location.href = index_url + '?per_page=' + val;
            });

            $('#goto').keyup(
                function(event) {
                    var code = event.keyCode ? event.keyCode : event.which;
                    var page = document.getElementById("goto").value;
                    var lastPage = '{{ $accounts->lastPage() }}';
                    

                        
                    if (code == 13) {
                        
                        if (parseInt(page) > parseInt(lastPage)) {
                            page = lastPage;
                        }
                        // ajaxTable(pagenum);
                        window.location.href = "{{ route('account.index') }}" +'?per_page={{ $per_page }}&page=' + page;
                    }
                }
            );
        });
    </script>
@endpush