@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Regular Expression')

@section('content')    
    <h1>Regular Expression with Route Parameter</h1>
    <a href="{{ url('/admin/routing/regular-expression/mta/20') }}">check regular expression with parameter</a>
@endsection

@section('script')
@endsection
