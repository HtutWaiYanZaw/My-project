@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title', 'Show Brand')

@section('content')
    <a href="{{ url('/admin/sales') }}" class="btn btn-primary">Go To Back</a>
    <hr>

    <table class="table">
        <tbody>
            <tr>
                <td>Order Id</td>
                <td>{{ $data->id }}</td>
            </tr>
            <tr>
                <td>Order Date</td>
                <td>{{ $data->invoice_date }}</td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td>{{ $data->total_amount }}</td>
            </tr>
            <tr>
                <td>Created By</td>
                <td>{{ $data->created_by }}</td>
            </tr>
            <tr>
                <td>Created At</td>
                <td>{{ $data->created_at }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Item Image</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Item Code</th>
                <th scope="col">Item Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data['items'] as $item)
                <tr>
                    <td>
                        <img src="{{ asset('/storage/' . $item->item_image) }}" alt="image"
                            style="width:100px;height:100px;">
                    </td>
                    <td> {{$item->brand_name}} </td>
                    <td> {{$item->category_name}} </td>
                    <td> {{ $item->item_code }} </td>
                    <td> {{ $item->item_name }} </td>
                    <td> {{ $item->saled_qty }}</td>
                    <td> {{ $item->saled_price }} </td>
                    <td>{{ $total = $item->saled_qty * $item->saled_price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('script')
@endsection
