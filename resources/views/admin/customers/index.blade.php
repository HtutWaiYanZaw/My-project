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
    <a href="/admin/customers/create" class="btn btn-primary mt-3">Create</a>

    <hr>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Action</th>
                <th>Customer Name</th>
                <th>Contact Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Craeted At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $customer)
                <tr>
                    <td>
                        <a href=" {{ url('/admin/customers/' . $customer->id . '/edit') }}"class="btn btn-primary">Edit</a>
                        <a href=" {{ url('/admin/customers/' . $customer->id) }} " class="btn btn-secondary">Show</a>
                        <button class="btn btn-danger delete" data-id="{{ $customer->id }}">Delete</button>
                    </td>

                    <td> {{ $customer->customer_name }} </td>
                    <td> {{ $customer->contact_name}} </td>
                    <td> {{$customer->address}} </td>
                    <td> {{ $customer->city }}</td>
                    <td>{{$customer->postal_code}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->created_at}}</td>
                    <td> {{$customer->updated_at}} </td>
                </tr>
            @endforeach

        </tbody>
    </table>



@endsection

@section('script')

    <script>
        new DataTable('#example');
    </script>

@endsection
