@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Customers')

@section('content')
    <a href="{{ url('/admin/customers') }}" class="btn btn-primary">Go To Back</a>
    <hr>

    <table class="table">
        <tbody>
            <tr>
                <td>Customer Name</td>
                <td>{{ $customer->customer_name }}</td>
            </tr>
            <tr>
                <td>Contact Name</td>
                <td>{{ $customer->contact_name }}</td>
            </tr>

            <tr>
                <td>Address </td>
                <td>{{ $customer->address }}</td>
            </tr>

            <tr>
                <td>City </td>
                <td>{{ $customer->city }}</td>
            </tr>

            <tr>
                <td>Postal Code</td>
                <td>{{ $customer->postal_code }}</td>
            </tr>

            <tr>
                <td>Country</td>
                <td>{{ $customer->country }}</td>
            </tr>

            <tr>
                <td>Created At</td>
                <td>{{ $customer->created_at }}</td>
            </tr>
            <tr>
                <td>Updated At</td>
                <td>{{ $customer->updated_at }}</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('script')
@endsection
