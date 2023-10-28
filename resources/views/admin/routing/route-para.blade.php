@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Route Para')

@section('content')    
    <h1 class="text-center" style="background-color:{{ $bgColor }};color:{{ $color }};">Header 1</h1>
@endsection

@section('script')
@endsection
