@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Show User')

@section('content')
    <a href="{{ url('/admin/customer_sales') }}" class="btn btn-primary">Go To Back</a>
    <hr>

    <table class="table">
        <tbody>
            <tr>
                <td>Customer Name</td>
                <td>{{ $data->customer_name }}</td>
            </tr>
            <tr>
                <td>Customer Code</td>
                <td>{{ $data->customer_code }}</td>
            </tr>
            <tr>
                <td>Contact Name</td>
                <td>{{ $data->contact_name }}</td>
            </tr>
            <tr>
                <td>Brand Name</td>
                <td>{{ $data->brand_name }}</td>
            </tr>
            <tr>
                <td>Category Name</td>
                <td>{{ $data->category_name}}</td>
            </tr>
            <tr>
                <td>Item Image</td>
                <td>{{ $data->item_image }}</td>
            </tr>
            <tr>
                <td>Item Name</td>
                <td>{{ $data->item_name }}</td>
            </tr>
            <tr>
                <td>Purchase Price</td>
                <td>{{ $data->purchase_price }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $data->address }}</td>
            </tr>
            <tr>
                <td>City</td>
                <td>{{ $data->city }}</td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td>{{ $data->postal_code }}</td>
            </tr>
            <tr>
                <td>Country</td>
                <td>{{ $data->country }}</td>
            </tr>
            <tr>
                <td>Created By</td>
                <td>{{ $data->created_by }}</td>
            </tr>
            <tr>
                <td>Updated By</td>
                <td>{{ $data->updated_by }}</td>
            </tr>

            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                </div>
                @else{
                    <div class="text-danger">its ok</div>
                }
            @endifP --}}


        </tbody>
    </table>
@endsection

@section('script')
@endsection
