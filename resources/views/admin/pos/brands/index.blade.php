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

@section('page-title','Brands')

@section('content') 
<a href="{{ url('/admin/brands/create') }}" class="btn btn-primary">Create</a>
<hr>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Actions</th>
                <th>Brand Name</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Updated By</th>  
                <th>Created At</th>
                <th>Updated At</th>                
            </tr>
        </thead>
        <tbody>                    
            @foreach($data as $brand)
                <tr>
                    <td>
                        <a href="{{ url('/admin/brands/' . $brand->id . '/edit') }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ url('/admin/brands/' . $brand->id ) }}" class="btn btn-info">Show</a>
                        <button class="btn btn-danger delete" data-id="{{ $brand->id }}">Delete</button>
                    </td>
                    <td>{{ $brand->brand_name }}</td>
                    <td>{{ $brand->description }}</td>
                    <td>{{ $brand->created_by }}</td>
                    <td>{{ $brand->updated_by }}</td>
                    <td>{{ $brand->created_at }}</td>
                    <td>{{ $brand->updated_at }}</td>
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
                    url: "/admin/brands/" + id,
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
