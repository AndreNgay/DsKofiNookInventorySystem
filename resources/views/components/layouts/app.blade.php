<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div>
        @if(Auth::check() && Auth::user()->profile_made == false)
        {{ $slot }}
        @elseif(Auth::check())
        <div id="sidebar">
            <div class="d-flex justify-content-center">
                <h2>Kofi-Nook</h2>
            </div>

            <br />
            <br />
            @if(Auth::user()->role == 'owner' || Auth::user()->role == 'employee')
            <!-- Home -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/home" ><i class="fas fa-solid fa-house"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/home"  class="link-text"> Home</a>
                </div>
            </div>

            <!-- Inventory -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/inventory-items"><i class="fas fa-solid fa-box-open"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/inventory-items"  class="link-text"> Inventory</a>
                </div>
            </div>

            <!-- Orders -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/orders"><i class="fas fa-solid fa-cart-shopping"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/orders"  class="link-text"> Orders</a>
                </div>
            </div>


            <hr />

            <!-- Menu -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/menu-items"><i class="fas fa-solid fa-mug-saucer"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/menu-items"  class="link-text"> Menu</a>
                </div>
            </div>

            <!-- Measurements -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/units"><i class="fa-solid fa-scale-unbalanced-flip"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/units"  class="link-text"> Units</a>
                </div>
            </div>
            @endif

            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'owner')
            <!-- Accounts -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/accounts"><i class="fas fa-solid fa-user-tie"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/accounts"  class="link-text"> Accounts</a>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="{{ route('logout') }}" id="logout"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-person-circle"></i>
                    </a>
                </div>

                <div class="col-md-1 link-item">
                    <a id="logout" class="link-text" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }} <i class="fas fa-caret-down"></i>
                        <!-- Badge for user notifications -->
                        <span class="badge bg-danger">3</span>
                    </a>

                    <ul class="dropdown-menu">
                        <!-- Badge for notifications dropdown item -->
                        <li><a class="dropdown-item" type="button">Notifications <span class="badge bg-danger">3</span></a></li>
                        <li><a href='edit-profile' class="dropdown-item" type="button">Profile</a></li>
                        <li>
                            <a class="dropdown-item" type="button" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
</a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    
                </div>
            </div>


        </div>

        <div id="content">
            {{ $slot }}
        </div>
        @else
        <div class="container">
            @yield('content')
        </div>
        @endif
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
<script src="/js/scripts.js"></script>

<script src="https://kit.fontawesome.com/890176446b.js" crossorigin="anonymous"></script>

</html>
