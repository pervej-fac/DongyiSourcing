@extends('layouts.back.master')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $title }}</h1>
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

    <div class="col-lg-8">
        <form role="form" action="{{route('transaction.update',$transaction->id)}}" method="post">

            @method('put')
            @include('admin.transaction._form')


            <button type="submit" class="btn btn-default">Apply Changes</button>
        </form>
    </div>


@endsection