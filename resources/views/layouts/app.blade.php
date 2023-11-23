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
            <h2>Kofi-Nook</h2>
            <a href="/inventory" wire:navigate><i class="fas fa-box"></i> Inventory</a>
            <a href="/order" wire:navigate><i class="fas fa-solid fa-mug-hot"></i> Orders</a>
            <a href="/menu" wire:navigate><i class="fas fa-bars"></i> Menu</a>
            <a href="/measurements"><i class="fas fa-solid fa-ruler-vertical"></i>  Measurements</a>
            <a href="/accounts"><i class="fas fa-solid fa-user-tie"></i> Accounts</a>
            <a href="/reports"><i class="fas fa-solid fa-chart-pie"></i> Reports</a>
            
            <a href="#edit-profile"><i class="fas fa-user-edit"></i> Edit Profile</a>


            <a href="{{ route('logout') }}" id="logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
<script src=/js/scripts.js> </script> 
<script>
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script>

</html>
