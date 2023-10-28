@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Update Category')

@section('content')
    {{-- {{dd($category)}} --}}
    <a href="{{ url('/admin/categories') }}" class="btn btn-primary">Go To Back</a>
    <hr>
    <form action="{{ url('admin/categories/' . $category->id) }}" method="post" novalidate>
        @csrf()
        @method('put')
        <input type="hidden" name="id" value="{{ $category->id }}">
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" class="form-control" name="category_name"
            value="{{ old('category_name',$category->category_name) }}">
            @if($errors->has('category_name'))
                <p class="text-danger mt-1">{{ $errors->first('category_name')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description',$category->description) }}</textarea>
            @if($errors->has('description'))
                <p class="text-danger mt-1">{{ $errors->first('description')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(()=>{
            $('[name="brand_name"]').focus();
        });
    </script>

@endsection
