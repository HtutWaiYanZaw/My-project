@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Update Brand')

@section('content')  
    <a href="{{ url('/admin/brands') }}" class="btn btn-primary">Go To Back</a>
    <hr>   
    <form action="{{ url('admin/brands/' . $brand->id) }}" method="post" novalidate>
        @csrf()
        @method('put')
        <input type="hidden" name="id" value="{{ $brand->id }}">
        <div class="mb-3">
            <label class="form-label">Brand Name</label>
            <input type="text" class="form-control" name="brand_name" 
            value="{{ old('brand_name',$brand->brand_name) }}">
            @if($errors->has('brand_name'))
                <p class="text-danger mt-1">{{ $errors->first('brand_name')}}</p>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description',$brand->description) }}</textarea>            
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
