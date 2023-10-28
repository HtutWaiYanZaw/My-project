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

@section('page-title','Sales')

@section('content')

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Actions</th>
                <th>Order Id</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Order By</th>
                <th>Order Time</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $sales)
                <tr>
                    <td>
                        <a href="{{ url('/admin/sales/' . $sales->id ) }}" class="btn btn-info">Show</a>
                    </td>
                    <td>{{ $sales->id }}</td>
                    <td>{{ $sales->invoice_date }}</td>
                    <td>{{ $sales->total_amount }}</td>
                    <td>{{ $sales->created_by }}</td>
                    <td>{{ $sales->created_at }}</td>
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
                    url: "/admin/sales/" + id,
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
