@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Show Brand')

@section('content')
    <a href="{{ url('/admin/categories') }}" class="btn btn-primary">Go To Back</a>
    <hr>

    <table class="table">
        <tbody>
            <tr>
                <td>Name</td>
                <td>{{ $data->category_name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $data->description }}</td>
            </tr>
            <tr>
                <td>Created At</td>
                <td>{{ $data->created_at }}</td>
            </tr>
            <tr>
                <td>Updated At</td>
                <td>{{ $data->updated_at }}</td>
            </tr>
        </tbody>
    </table>
@endsection

@section('script')
@endsection
