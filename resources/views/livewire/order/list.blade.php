<?php

use Livewire\Volt\Component;
use App\Models\Order;
use App\Models\User;

new class extends Component {
    public $orders;
    public $users;

    public function mount() {
        $this->orders = Order::all();
        $this->users = User::all();
    }
}; ?>

<div>
<div class="mb-2">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search by item name" aria-label="Search"
                id="query" name="query">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Taken At</th>
                    <th scope="col">Taken By</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        @foreach ($users as $user)
                        @if ($user->id == $order->taken_by)
                        {{ $user->name }}
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $order->total_price }}</td>
                    <td class="d-flex">
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="bi bi-pencil-square"> Edit</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-2" wire:click="delete"
                            wire:confirm="Are you sure you want to delete this item?">
                            <span class="bi bi-trash-fill"> Delete</span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


