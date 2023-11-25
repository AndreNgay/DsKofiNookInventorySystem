<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    <button type="button" class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        New Order
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <tr>
                    <th>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Latte</option>
                            <option value="1">One</option>
                        </select>
                    </th>
                    <td>$3.00</td>
                    <td>
                        <input type="number" class="form-control" value="1">
                    </td>

                    <td class="d-flex">
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">+</span>
                        </button>
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">-</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-2" wire:click="delete"
                            wire:confirm="Are you sure you want to delete this item?">
                            <span class="bi bi-trash-fill"></span>
                        </button>
                    </td>
                </tr>

                <tr>
                    <th>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Black Coffee</option>
                            <option value="1">One</option>
                        </select>
                    </th>
                    <td>$3.00</td>
                    <td>
                        <input type="number" class="form-control" value="1">
                    </td>

                    <td class="d-flex">
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">+</span>
                        </button>
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">-</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-2" wire:click="delete"
                            wire:confirm="Are you sure you want to delete this item?">
                            <span class="bi bi-trash-fill"></span>
                        </button>
                    </td>
                </tr>

                <!-- Additional Dummy Data -->
                <tr>
                    <th>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Espresso</option>
                            <option value="1">One</option>
                        </select>
                    </th>
                    <td>$2.50</td>
                    <td>
                        <input type="number" class="form-control" value="2">
                    </td>

                    <td class="d-flex">
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">+</span>
                        </button>
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">-</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-2" wire:click="delete"
                            wire:confirm="Are you sure you want to delete this item?">
                            <span class="bi bi-trash-fill"></span>
                        </button>
                    </td>
                </tr>

                <tr>
                    <th>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Iced Tea</option>
                            <option value="1">One</option>
                        </select>
                    </th>
                    <td>$2.00</td>
                    <td>
                        <input type="number" class="form-control" value="3">
                    </td>

                    <td class="d-flex">
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">+</span>
                        </button>
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">-</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-2" wire:click="delete"
                            wire:confirm="Are you sure you want to delete this item?">
                            <span class="bi bi-trash-fill"></span>
                        </button>
                    </td>
                </tr>

                <tr>
                    <th>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Cappuccino</option>
                            <option value="1">One</option>
                        </select>
                    </th>
                    <td>$3.50</td>
                    <td>
                        <input type="number" class="form-control" value="1">
                    </td>

                    <td class="d-flex">
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">+</span>
                        </button>
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">-</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-2" wire:click="delete"
                            wire:confirm="Are you sure you want to delete this item?">
                            <span class="bi bi-trash-fill"></span>
                        </button>
                    </td>
                </tr>

                <tr>
                    <th>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>New Item</option>
                            <option value="1">Latte</option>
                            <option value="1">Black Coffee</option>
                            <option value="1">Espresso</option>
                            <option value="1">Iced Tea</option>
                            <option value="1">Cappucino</option>
                        </select>
                        
                    </th>
                    <td>$0.00</td>
                    <td>
                        <input type="number" class="form-control" value="0">
                    </td>

                    <td class="d-flex">
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">+</span>
                        </button>
                        <button class="btn btn-primary ms-2" type="button">
                            <span class="">-</span>
                        </button>
                        <button type="button" class="btn btn-primary ms-2" wire:click="delete"
                            wire:confirm="Are you sure you want to delete this item?">
                            <span class="bi bi-trash-fill"></span>
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
        <h3>Total Price: $20.50</h3>
    </div>
    <hr />

    <div class="d-flex justify-content-end">
        <div wire:click="toggleForm">
            <livewire:components.buttons.close />
        </div>
        <div wire:click="store">
            <livewire:components.buttons.submit />
        </div>
    </div>


</div>
