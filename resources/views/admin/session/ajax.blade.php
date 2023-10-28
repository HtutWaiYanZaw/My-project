@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Ajax')

@section('content')    

    <button class="btn btn-primary get-session" data-value="s1">Get S1 Session</button>
    <hr>
    <button class="btn btn-primary get-session" data-value="s2">Get S1 Session</button>
    <hr>
    <button class="btn btn-primary get-session" data-value="s3">Get S1 Session</button>
    <hr>

@endsection

@section('script')
    <script>
        $(document).ready(()=>{
            $('.get-session').click((event)=>{
                console.log(event.currentTarget);
                let jQueryButton = $(event.currentTarget);
                let value = jQueryButton.data('value');
                console.log(value);

                $.ajax({
                    type: 'get',
                    url: "/admin/session/get-session/" + value,
                    dataType: "json",
                    success: (data)=>{
                        alert(data);
                    },
                    error: (error)=>{
                        console.log(error);
                    }

                });
            });
        });
    </script>

@endsection
