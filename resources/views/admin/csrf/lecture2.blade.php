@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Lecture 2')

@section('content')    
    <form action="{{ url('/admin/csrf/create') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Age</label>
            <input type="number" name="age" class="form-control">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('script')
@endsection
