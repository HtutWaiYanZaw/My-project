@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Middleware')

@section('content')    
    <form action="{{ url('/admin/routing/check-middleware') }}" 
    method="post">
        @csrf
        <div class="mb-3">
            <label for="">Age</label>
            <input type="text" name="age" class="form-control">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('script')
@endsection
