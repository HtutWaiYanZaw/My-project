@extends('pos.layout.app')

@section('style')
@endsection

@section('navbar')
    @parent
@endsection




@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Item Image</th>
                <th scope="col">Item Code</th>
                <th scope="col">Item Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Item Price</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($cartItems as $item)
                <tr>
                    <td>
                        <img src="{{ asset('/storage/' . $item->item_image) }}" alt="image"
                            style="width:100px;height:100px;">
                    </td>
                    <td> {{ $item->item_code }} </td>
                    <td> {{ $item->item_name }} </td>
                    <td> {{ $item->qty }}</td>
                    <td> {{ $item->purchase_price }} </td>
                    <td>{{ $total = $item->qty * $item->purchase_price }}</td>
                    <td>
                        <button class="btn btn-danger btn-remove-item" data-id="{{ $item->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td colspan="4"></td>
                <td class="fw-bold">Total Price</td>
                <td id="total-price"></td>
            </tr>

        </tbody>
    </table>

    <div class="d-flex justify-content-between">
        <button class="btn btn-danger" id="btn-empty-cart">
            <i class="fas-fa-trash-alt">Empty Cart</i> &nbsp;
        </button>
        <button class="btn btn-danger" id="btn-checkout">
            <i class="fas-fa-money-check">Check Out</i>&nbsp;
        </button>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(() => {

            updateQuantityOnLoad();

            updateTotalPrice();


            function updateTotalPrice() {
                let cart = @json(session()->has('cart') ? session()->get('cart') : []);

                let totalPrice = 0;

                cart.forEach(item => {
                    totalPrice += item.purchase_price * item.qty;
                    console.log(item);
                });
                $('#total-price').html(totalPrice);
            }

            function updateQuantityOnLoad() {
                let cart = @json(session()->has('cart') ? session()->get('cart') : []);
                $('#item-qty').html(cart.length);
            }



            $('#btn-empty-cart').click(() => {
                $.ajax({
                    type: "post",
                    url: "{{ url('pos/empty-cart') }}",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: (data) => {
                        $('#tbody').empty();
                        $('#item-qty').html(0);

                        console.log(data);
                        updateTotalPrice();
                    },

                    error: (error) => {
                        console.log(error);
                    }

                })

            })


            $('.btn-remove-item').click((event) => {
                let removeButton = $(event.currentTarget);
                let itemId = removeButton.data('id');
                // console.log(itemId)

                $.ajax({
                    type: "post",
                    url: "{{ url('pos/remove-item') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id" : itemId,

                    },
                    success: (data) => {
                        removeButton.parent().parent().remove();
                        $('#item-qty').html(data.length);

                        let totalPrice = 0;

                        data.forEach(item => {
                            totalPrice += item.purchase_price * item.qty
                        });

                        $('#total-price').html(totalPrice);

                        console.log(data);
                    },

                    error: (error) => {
                        console.log(error);
                    }

                })
            });


            $('#btn-checkout').click(()=>{
                let totalPrice = $('#total-price').html();
                $.ajax({
                    type: "post",
                    url: "{{ url('pos/checkout') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "total_price" : totalPrice

                    },
                    success: (data) => {
                        alert ("You make the order successfully");
                        window.location.replace("http://localhost:8000/pos")
                    },

                    error: (error) => {
                        console.log(error);
                    }
                })
            });


        });
    </script>
@endsection

