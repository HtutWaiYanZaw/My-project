@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Put')

@section('content')    
    <form action="{{ url('/admin/session/put-session') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Session 1</label>
            <input type="text" class="form-control" name="session1">            
        </div>
        <div class="mb-3">
            <label class="form-label">Session 2</label>
            <input type="text" class="form-control" name="session2">            
        </div>
        <div class="mb-3">
            <label class="form-label">Session 3</label>
            <input type="text" class="form-control" name="session3">            
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('script')
@endsection
