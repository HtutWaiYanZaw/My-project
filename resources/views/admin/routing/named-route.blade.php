@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Named Route')

@section('content') 
    <p>url() => {{ url('/admin/routing/named-route') }}</p>
    <p>route() => {{ route('named-route') }}</p>
@endsection

@section('script')
@endsection
