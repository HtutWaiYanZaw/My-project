@extends('admin.layouts.app')

@section('style')
    <style>
        h4{
            color:tomato;
        }
    </style>
@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Page1')

@section('content')
    <h4>This is my first page in laravel</h4>
@endsection

@section('script')
    <script>
        //alert('page1');
    </script>
@endsection
