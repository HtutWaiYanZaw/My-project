@extends('admin.layouts.app')

@section('style')
  
@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Edit Portfolio Image')

@section('content') 
<a href="{{ url('/admin/portfolio-images') }}" class="btn btn-primary">Go To Back</a>
<hr>
<form action="{{ url('admin/portfolio-images/' . $portfolioImage->id) }}" method="post" enctype="multipart/form-data">
    @csrf()
    @method('put')
    <input type="hidden" name="id" value="{{ $portfolioImage->id }}">
    <div class="mb-3">
        <img src="{{ asset('/storage/' . $portfolioImage->image) }}" alt="image" width="200px" height="200px">
    </div>
    <div class="mb-3">
        <label  class="form-label">Portfolio Image</label>
        <input type="file" class="form-control" name="image">
        @if($errors->has('image'))
            <p class="text-danger">{{ $errors->first('image') }}</p>
        @endif
    </div>
    <div class="mb-3">
        <label  class="form-label">Portfolio Image Label</label>
        <input type="text" class="form-control" name="image_label" 
        value="{{ old('image_label', $portfolioImage->image_label) }}">
        @if($errors->has('image_label'))
            <p class="text-danger">{{ $errors->first('image_label') }}</p>
        @endif
    </div>
    <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea class="form-control" name="image_description" 
        rows="3">{{ old('image_description', $portfolioImage->image_description) }}</textarea>        
        @if($errors->has('image_description'))
            <p class="text-danger">{{ $errors->first('image_description') }}</p>
        @endif
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection

@section('script')   
@endsection
