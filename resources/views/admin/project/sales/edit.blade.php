@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title', 'Customer Sale')

@section('content')
    <a href="/admin/customer_sales" class="btn btn-primary mt-3">Back</a>

    <hr>

    <form action="{{url(admin/customer_sales)}}"></form>



@endsection

@section('script')

    <script>
        new DataTable('#example');
    </script>

@endsection
