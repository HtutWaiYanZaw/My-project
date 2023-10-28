@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Lecture 3')

@section('content')    
    <button class="btn btn-primary"
     id="submit">Submit</button>
    <hr>
    <ul class="list-group text-center">        

    </ul>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(()=>{
            $('#submit').click(()=>{                
                $.ajax({
                    type:"post",
                    url: "/admin/csrf/get-list-item-data",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: (data)=>{
                        console.log(data);
                        $('.list-group').empty();
                        data.forEach(i => {
                            let item = `<li class='list-group-item'>${i}</li>`;
                            $('.list-group').append(item);
                        });
                    },
                    error: (error)=>{
                        console.log(error);
                    }
                });
            });
            
        });
    </script>
@endsection
