<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/pos')}}">POS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a href="{{url('/pos/cart')}}" class="nav-link"
                ><i class="fas fa-cart-plus"></i>
            <span class="badge bg-dark" id="item-qty">0</span></a>
            </li>

            @if (Auth::user())
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('pos/logout')}}">Sign Out</a>
            </li>

            @endif

            @if (!Auth::user())
            <li class="nav-item">
                <a class="nav-link" href="{{url('pos/sign-in')}}">Sign In</a>
            </li>

        @endif

            <li class="nav-item">
                <a class="nav-link" href="{{url('pos/sign-up')}}">Sign Up</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
