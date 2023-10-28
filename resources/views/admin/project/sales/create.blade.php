@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title', 'Customer Sale')

@section('content')
    <a href="/admin/customer_sales" class="btn btn-primary mt-3">Back</a>

    <hr>

    <form action="{{ url('admin/customer_sales/') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Item Image</label>
            <input type="file" class="form-control" name="item_image">
            @if ($errors->has('item_image'))
                {
                <p class="text-danger"> {{ $errors->first('item_image') }} </p>
                }
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="customer_name">
            @if ($errors->has('item_image'))
                
                <p class="text-danger"> {{ $errors->first('customer_name') }} </p>
                
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Customer Code</label>
            <input type="number" class="form-control" name="customer_code">
            @if ($errors->has('customer_code'))
                
                <p class="text-danger">{{ $errors->first('customer_code') }}</p>}
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Contact Name</label>
            <input type="text" class="form-control" name="contact_name">
            @if ($errors->has('contact-name'))
                
                <p class="text-danger">{{ $errors->first('contact-name') }}</p>}
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Brand Name</label>
            <select class="form-select" name="brand_id">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->brand_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <select class="form-select" name="brand_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}</option>
                    </option>
                @endforeach



            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Item Name</label>
            <input type="text" class="form-control" name="item_name">
        </div>

        <div class="mb-3">
            <label class="form-label">Purchase Price</label>
            <input type="text" class="form-control" name="purchase_price">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address">
        </div>

        <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" class="form-control" name="city">
        </div>

        <div class="mb-3">
            <label class="form-label">Postal Code</label>
            <input type="text" class="form-control" name="postal_code">
        </div>

        <div class="mb-3">
            <label class="form-label">Country</label>
            <input type="text" class="form-control" name="country">
        </div>

        <button class="btn btn-primary mx-auto" type="submit">Submit</button>

        @if ($errors->any()){
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error){
                        <li>{{ $errors }} </li>

                    }
                    @endforeach
                </ul>
            </div>
        }

        @endif

    </form>



@endsection

@section('script')

    <script>
        new DataTable('#example');
    </script>

@endsection
