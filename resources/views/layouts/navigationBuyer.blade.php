<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button"  data-toggle="dropdown">
                    Products
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/productsBuyer">All Products</a>
                        <a class="dropdown-item" href="/features"> Features</a>
                    </div>
                </div>
            <li class="nav-item">
                <a class="nav-link" href="/ordersbuyer">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reviews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/viewcart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Shopping Cart</a>
            </li>
            <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </li>
        </ul>
    </div>
</nav>

