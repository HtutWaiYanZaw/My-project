@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Delete')

@section('content') 
    <form action="{{ url('admin/session/delete/s1') }}" method="post">
        @csrf()
        <button class="btn btn-primary">Delete Session 1</button>
    </form>

    <hr>

    <form action="{{ url('admin/session/delete/s2') }}" method="post">
        @csrf()
        <button class="btn btn-primary">Delete Session 2</button>
    </form>

    <hr>

    <form action="{{ url('admin/session/delete/s3') }}" method="post">
        @csrf()
        <button class="btn btn-primary">Delete Session 3</button>
    </form>

    <hr>

    <form action="{{ url('admin/session/delete/delete-all-session') }}" method="post">
        @csrf()
        <button class="btn btn-primary">Delete ALL</button>
    </form>
    
    <hr>
    <h3>{{ session()->has('s1')? session()->get('s1') : 'nothing' }}</h3>
    <h3>{{ session()->has('s2')? session()->get('s2') : 'nothing' }}</h3>
    <h3>{{ session()->has('s3')? session()->get('s3') : 'nothing' }}</h3>
    
@endsection

@section('script')
@endsection
