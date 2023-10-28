@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Json String')

@section('content')
    <h1>List Items (PHP)</h1>
    <ul id="lists">           
    </ul>
    <hr>
    @json($listItems)

@endsection

@section('script')

    <script>
        $(document).ready(()=>{
            let listItems = @json($listItems);
            console.log(listItems);
            listItems.forEach(listItem => {
                let li = `<li>
                            <a href="${listItem.href}">${listItem.text}</a>                       
                        </li>`;
                $('#lists').append(li);
            });
        });
    </script>
@endsection
