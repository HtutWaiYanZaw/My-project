@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Dynamic Route Para')

@section('content') 
    <form action="{{ url('admin/routing/dynamic-route-para/submit') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Background Color</label>
            <input type="text" class="form-control" name="bgColor">
        </div>
        <div class="mb-3">
            <label class="form-label">Color</label>
            <input type="text" class="form-control" name="color">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>

@endsection

@section('script')
@endsection
