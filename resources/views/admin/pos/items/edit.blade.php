@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Edit Item')

@section('content')  
    
    <a href="{{ url('/admin/items') }}" class="btn btn-primary">Go To Back</a>
    <hr>   
    <form action="{{ url('admin/items/' . $item->id) }}" method="post" novalidate>
        @method('put')
        @csrf()
        <input type="hidden" name="id" value="{{$item->id}}">
        <div class="mb-3">
            <label class="form-label">Brand Name</label>
            <select class="form-select" name="brand_id">  
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id',$item->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>       
                @endforeach
                
            </select>
            @if($errors->has('brand_id'))
                <p class="text-danger mt-1">{{ $errors->first('brand_id')}}</p>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <select class="form-select" name="category_id">                
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id',$item->category_id) == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>       
                @endforeach             
            </select>
            @if($errors->has('category_id'))
                <p class="text-danger mt-1">{{ $errors->first('category_id')}}</p>                
            @endif
        </div>        
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            
            @if($errors->has('category_name'))
                <p class="text-danger mt-1">{{ $errors->first('category_name')}}</p>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Item Code</label>
            <input type="text" class="form-control" name="item_code" 
            value="{{ old('item_code',$item->item_code) }}">
            @if($errors->has('item_code'))
                <p class="text-danger mt-1">{{ $errors->first('item_code')}}</p>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Item Name</label>
            <input type="text" class="form-control" name="item_name" 
            value="{{ old('item_name',$item->item_name) }}">
            @if($errors->has('item_name'))
                <p class="text-danger mt-1">{{ $errors->first('item_name')}}</p>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Qty</label>
            <input type="number" class="form-control" name="qty" 
            value="{{ old('qty', $item->in_hand_qty) }}">
            @if($errors->has('qty'))
                <p class="text-danger mt-1">{{ $errors->first('qty')}}</p>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" 
            value="{{ old('price', $item->purchase_price) }}">
            @if($errors->has('price'))
                <p class="text-danger mt-1">{{ $errors->first('price')}}</p>                
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Warranty</label>
            <input type="text" class="form-control" name="warranty" 
            value="{{ old('warranty' , $item->warranty) }}">
            @if($errors->has('warranty'))
                <p class="text-danger mt-1">{{ $errors->first('warranty')}}</p>                
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
            $('[name="brand_id"]').focus();
        });
    </script>
    
@endsection
