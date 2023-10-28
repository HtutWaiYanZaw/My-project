<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('storage/pos/pos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @yield('style')
</head>
<body>
    <div id="pos">
       {{-- navbar  --}}
        @section('navbar')
            @include('pos.layout.navbar')
        @show
       {{-- end navbar   --}}
        <div class="container pt-3">
            @yield('content')
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Sign In</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(()=>{
            $('#item-search').focus();

            $('#item-search').keydown((event)=>{
                let itemCode = $('#item-search').val()? $('#item-search').val(): 'empty' ;
                if(event.key == "Enter"){
                    $.ajax({
                        type: "get",
                        dataType: "json",
                        url: `{{ url('/pos/search-item/${itemCode}' ) }}`,
                        success: (data)=>{
                            let items = data;
                            $('#items .row').empty();
                            items.forEach(item => {
                                let imagePath = "http://localhost:8000/storage/" + item.item_image;
                                let itemElement =   `<div class="col-md-3">
                                                        <div class="item text-center">
                                                            <img src="${imagePath}"
                                                            alt="${item.item_code}" style="height:200px;width:100%">
                                                            <p>${item.item_name}</p>
                                                            <p>${item.item_code}</p>
                                                            <p>${item.purchase_price}</p>
                                                            <button class="btn btn-primary">Order</button>
                                                        </div>
                                                    </div>`;
                                $('#items .row').append(itemElement);
                            });
                        },
                        error: (error)=>{
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>
    @yield('script')
</body>
</html>

