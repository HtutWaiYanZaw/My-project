@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title', 'Customer')

@section('content')


    <a href="/admin/customers" class="btn btn-primary mt-3">Back</a>
    <hr>

    <form action="{{ url('admin/customers/' . $customer->id) }}" method="post" novalidate>
        @csrf()
        @method('put')

        {{-- <form action="{{ url('admin/brands/' . $brand->id) }}" method="post" novalidate>
            @csrf()
            @method('put') --}}
        <div class="mb-3">
            <label class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="customer_name"
                value="{{ old('customer_name', $customer->customer_name) }}">

            @if ($errors->has('customer_name'))
                <p class="text-danger mt-1">{{ $errors->first('customer_name') }}</p>
            @endif

        </div>

        <div class="mb-3">
            <label class="form-label">Contact Name</label>
            <input type="text" class="form-control" name="contact_name"
                value="{{ old('contact_name', $customer->contact_name) }}">

            @if ($errors->has('contact_name'))
                <p class="text-danger mt-1"> {{ $errors->first('contact_name') }} </p>
            @endif

        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="3"> {{ old('address', $customer->address) }} </textarea>

            @if ($errors->has('address'))
                <p class="text-danger mt-1"> {{ $errors->first('address') }} </p>
            @endif

        </div>

        <div class="mb-3">
            <label class="form-label">City </label>
            <input type="text" class="form-control" name="city" value="{{ old('city', $customer->city) }}">

            @if ($errors->has('city'))
                <p class="text-danger mt-1"> {{ $errors->first('city') }} </p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Postal Code</label>
            <input type="text" class="form-control" name="postal_code"
                value="{{ old('postal_code', $customer->postal_code) }}">

            @if ($errors->has('postal_code'))
                <p class="text-danger mt-1">{{ $errors->first('postal_code') }}</p>
            @endif

        </div>

        <div class="mb-3">
            <label class="form-label">Country</label>
            <input type="text" class="form-control" name="country" value="{{ old('country', $customer->country) }}">

            @if ($errors->has('country'))
                <p class="text-danger mt-1">{{ $errors->first('country') }}</p>
            @endif
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit" class="btn btn-success float-end me-2 ">Submit</button><br />

    </form>



@endsection

@section('script')

    <script>
        new DataTable('#example');
        $(document).ready(() => {
            $('[name="customer_name"]').focus();
        });
    </script>

@endsection
