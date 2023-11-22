<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<nav class="navbar navbar-expand-lg mb-3 bg-wheat">
    <div class="container-fluid">
        <a class="navbar-brand" href="/inventory" wire:navigate>
            Kofi Nook
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(Auth::user()->role == 'owner')
                <li class="nav-item">
                    <a class="nav-link" href="/inventory" wire:navigate>Inventory</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/menu" wire:navigate>Menu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/orders" wire:navigate>Orders</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/reports">Reports</a>
                </li>
                @endif
            </ul>
            @endauth

            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @auth
                        <h5><i>{{ Auth::user()->first_name }}
                                {{ Auth::user()->last_name }} <span class="bi bi-person-lines-fill"></span></i></h5>
                        @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            @auth
                            <a class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#updateProfileModal{{ Auth::user()->id }}">Profile
                            </a>
                            @endauth
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
