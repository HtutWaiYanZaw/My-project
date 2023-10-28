@extends('pos.layout.app')

@section('style')

@endsection

@section('navbar')
    @parent
@endsection




@section('content')

@endsection

@section('script')
    <script>
        $(document).ready(()=>{
            updateItemQtyOnLoad();


            function updateItemQtyOnLoad () {
                let cart = @json(session()->has('cart') ? session()->get('cart') : [] );
                $('#item-qty').html(cart.length);
            }
        });
    </script>
@endsection
