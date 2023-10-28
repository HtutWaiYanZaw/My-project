@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Flash')

@section('content')   
    @if(session()->has('flash-message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Saved!</strong> {{ session()->get('flash-message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <hr>
    <form action="{{ url('/admin/session/flash-session') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">            
        </div>
        <div class="mb-3">
            <label class="form-label">Age</label>
            <input type="number" class="form-control" name="age">            
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form> 

    <hr>
    <p>{{ session()->has('name')? session()->get('name') : "nothing" }}</p>
    <p>{{ session()->has('age')? session()->get('age') : "nothing" }}</p>
    <p>{{ session()->has('address')? session()->get('address') : "nothing" }}</p>
@endsection

@section('script')
@endsection
