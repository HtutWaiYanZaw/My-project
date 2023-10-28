@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Items')

@section('content')
<a href="{{ url('/admin/items/create') }}" class="btn btn-primary">Create</a>
<hr>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Actions</th>
                <th>Brand Name</th>
                <th>Category Name</th>
                <th>Item Image</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>In Hand Quantity</th>
                <th>Purchase Price</th>
                <th>Warranty</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>
                        <a href="{{ url('/admin/items/' . $item->id . '/edit') }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ url('/admin/items/' . $item->id ) }}" class="btn btn-info">Show</a>
                        <button class="btn btn-danger delete" data-id="{{ $item->id }}">Delete</button>
                    </td>
                    <td>{{ $item->brand_name }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>
                        <img src="{{ asset('/storage/' . $item->item_image) }}" alt="image" style="width:100px;height:100px;">
                    </td>
                    <td>{{ $item->item_code }}</td>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->in_hand_qty }}</td>
                    <td>{{ $item->purchase_price }}</td>
                    <td>{{ $item->warranty }}</td>
                    <td>{{ $item->created_by }}</td>
                    <td>{{ $item->updated_by }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(()=>{
            showFlashMessage();
            $('#example').DataTable();

            $(document).on('click','.delete',(event)=>{
                let deleteButton = $(event.currentTarget);
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

            function deleteRecord(id){
                $.ajax({
                    type: "DELETE",
                    url: "/admin/items/" + id,
                    data: {
                        "_token" : "{{ csrf_token() }}"
                    },
                    success: (data)=>{
                        console.log(data);
                    },
                    error: (error)=>{
                        console.log(error);
                    }

                });
            }

            function showFlashMessage(){
                let message = "{{ session()->get('message') }}";
                if(message){
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
