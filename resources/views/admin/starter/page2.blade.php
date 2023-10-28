@extends('admin.layouts.app')

@section('style')
    <style>
        h4{
            color:dodgerblue;
        }
    </style>
@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Page2')

@section('content')
    <h4>This is my second page in laravel</h4>
@endsection

@section('script')
@endsection
