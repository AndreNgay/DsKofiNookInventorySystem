<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <div id="sidebar">
        <h2>Kofi-Nook</h2>
        <a href="#menu"><i class="fas fa-bars"></i> Menu</a>
        <a href="#inventory"><i class="fas fa-box"></i> Inventory</a>
        <!-- Edit Profile link -->
        <a href="#edit-profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
        <!-- Logout link -->
        <a href="#logout" id="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <div id="content">
        <!-- Your main content goes here -->
        @section('co')
    </div>
</div>