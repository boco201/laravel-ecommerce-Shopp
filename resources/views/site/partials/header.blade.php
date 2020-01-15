<header class="section-header">
    <section class="header-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="brand-wrap">
                        <a href="{{ url('/') }}">
                            <img class="logo" src="{{ asset('frontend/images/logo-dark.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                   <p style="color: #fff;">Bénéficier de la remise jusqu'à <span class="remise"> -70%</span> pour les achats depassant 100 €</p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widgets-wrap d-flex justify-content-end">
                        <div class="widget-header">
                            <a href="{{ route('checkout.cart') }}" class="icontext">
                                <div class="icon-wrap icon-xs bg2 round text-secondary"><i
                                        class="fa fa-shopping-cart"></i></div>
                                <div class="text-wrap">
                                    <small>{{ $cartCount }} items</small>
                                </div>
                            </a>
                        </div>
                        @guest
                            <div class="widget-header">
                                <a href="{{ route('login') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-primary round text-white"><i class="fa fa-user"></i></div>
                                    <div class="text-wrap"><span>Login</span></div>
                                </a>
                            </div>
                            <div class="widget-header">
                                <a href="{{ route('register') }}" class="ml-3 icontext">
                                    <div class="icon-wrap icon-xs bg-success round text-white"><i class="fa fa-user"></i></div>
                                    <div class="text-wrap"><span>Register</span></div>
                                </a>
                            </div>
                        @else
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->full_name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('account.orders') }}">Orders</a>
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
                        @endguest
                    </div>
                </div>
                 <div class="col-lg-10 col-sm-10" style="padding-top: 20px; margin-left: 130px;">
                    <form action="{{ route('searchProducts')}}" class="search-wrap">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Que recherchez-vous ? " name="searchText">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="searchText">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('site.partials.nav')
</header>
