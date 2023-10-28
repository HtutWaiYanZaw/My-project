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
    <a href="/admin/customer_sales/create" class="btn btn-primary mt-3">Create</a>

    <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Action</th>
                <th>Customer Name</th>
                <th>Customer Code</th>
                <th>Contact Name</th>
                <th>Brand Name</th>
                <th>Category Name</th>
                <th>Item Image</th>
                <th>Item Name</th>
                <th>Purchase Price</th>
                <th>Address</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Craeted At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $customer_sales)
                <tr>
                    <td>
                        <a
                            href=" {{ url('/admin/customer_sales/' . $customer_sales->id . '/edit') }}"class="btn btn-primary">Edit</a>
                        <a href=" {{ url('/admin/customer_sales/' . $customer_sales->id) }} "
                            class="btn btn-secondary">Show</a>
                        <button class="btn btn-danger delete" data-id="{{ $customer_sales->id }}">Delete</button>
                    </td>

                    <td> {{ $customer_sales->customer_name }} </td>
                    <td> {{ $customer_sales->customer_code }} </td>
                    <td> {{ $customer_sales->contact_name }} </td>
                    <td> {{ $customer_sales->brand_name }} </td>
                    <td> {{ $customer_sales->category_name }} </td>
                    <td>
                        <img src="{{ asset('/storage/' . $customer_sales->item_image) }}" alt="image"
                            style="width:100px;height:100px;">
                    </td>
                    <td>
                        {{ $customer_sales->item_name }}
                    </td>
                    <td> {{ $customer_sales->purchase_price }} </td>
                    <td> {{ $customer_sales->address }} </td>
                    <td> {{ $customer_sales->city }}</td>
                    <td>{{ $customer_sales->postal_code }}</td>
                    <td>{{ $customer_sales->country }}</td>
                    <td>{{ $customer_sales->created_at }}</td>
                    <td> {{ $customer_sales->updated_at }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(() => {
            new DataTable('#example');
            showFlashMessage();
            $(document).on('click', '.delete', (event) => {
                let deleteButton = $(event.currentTarget);
                console.log(deleteButton);
                let id = deleteButton.data('id');
                let row = deleteButton.parent().parent();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    console.log(result);
                    if (result.isConfirmed) {
                        row.remove();
                        deleteRecord(id);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    }
                })
            });

            function deleteRecord(id) {
                $.ajax({
                    type: "DELETE",
                    url: "/admin/customer_sales/" + id,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: (data) => {
                        console.log(data);
                    },
                    error: (error) => {
                        console.log(error);
                    }

                })
            }

            function showFlashMessage() {
                let message = "{{ session()->get('message') }}";
                if (message) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });
    </script>

@endsection
