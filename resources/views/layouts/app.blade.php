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
</head>

<body>

    <div>
        @if(Auth::check())
        <div id="sidebar">
            <div class="d-flex justify-content-center">
            <h2>Kofi-Nook</h2>
            </div>
            
            <br />
            <br />
            <!-- Home -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/home" wire:navigate><i class="fas fa-solid fa-house"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/home" wire:navigate class="link-text"> Home</a>
                </div>
            </div>

            <!-- Inventory -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/inventory" wire:navigate><i class="fas fa-box"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/inventory" wire:navigate class="link-text"> Inventory</a>
                </div>
            </div>

            <!-- Orders -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/order" wire:navigate><i class="fas fa-solid fa-mug-hot"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/order" wire:navigate class="link-text"> Orders</a>
                </div>
            </div>

            <hr />

            <!-- Menu -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/menu" wire:navigate><i class="fas fa-bars"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/menu" wire:navigate class="link-text"> Menu</a>
                </div>
            </div>

            <!-- Measurements -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/measurements" wire:navigate><i class="fa-solid fa-scale-unbalanced-flip"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/measurements" wire:navigate class="link-text"> Measurements</a>
                </div>
            </div>

            <!-- Accounts -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="/accounts" wire:navigate><i class="fas fa-solid fa-user-tie"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="/accounts" wire:navigate class="link-text"> Accounts</a>
                </div>
            </div>

            <!-- Edit Profile -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="#edit-profile"><i class="fas fa-user-edit"></i></a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="#edit-profile" class="link-text"> Profile</a>
                </div>
            </div>

            <!-- Logout -->
            <div class="row">
                <div class="col-md-1 link-item">
                    <a href="{{ route('logout') }}" id="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
                <div class="col-md-1 link-item">
                    <a href="{{ route('logout') }}" id="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="link-text">
                         Logout
                    </a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

        <div id="content">
            @yield('content')
        </div>
        @else
        <div class="container">
            @yield('content')
        </div>
        @endif
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous">
</script>
<script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
<script src="/js/scripts.js"></script>

<script src="https://kit.fontawesome.com/890176446b.js" crossorigin="anonymous"></script>

</html>
