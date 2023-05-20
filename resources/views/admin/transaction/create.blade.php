@extends('layouts.back.master')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Transaction</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-12">
            @if ($errors->any())
                <div class="text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form role="form" action="{{ route('transaction.store') }}" method="post">
                @include('admin.transaction._form')

                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection