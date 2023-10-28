@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Get')

@section('content')    
    <p>{{ session()->has('s1')? session()->get('s1') : "nothing" }}</p>
    <p>{{ session()->has('s2')? session()->get('s2') : "nothing" }}</p>
    <p>{{ session()->has('s3')? session()->get('s3') : "nothing" }}</p>
@endsection

@section('script')
@endsection
