@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Create Category')

@section('content')
    <a href="{{ url('/admin/categories') }}" class="btn btn-primary">Go To Back</a>
    <hr>
    <form action="{{ url('admin/categories') }}" method="post" novalidate>
        @csrf()
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" class="form-control" name="category_name"
            value="{{ old('category_name') }}">
            @if($errors->has('category_name'))
                <p class="text-danger mt-1">{{ $errors->first('category_name')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            @if($errors->has('description'))
                <p class="text-danger mt-1">{{ $errors->first('description')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(()=>{
            $('[name="category_name"]').focus();
        });
    </script>

@endsection
