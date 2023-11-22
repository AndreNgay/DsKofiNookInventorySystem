<?php

use Livewire\Volt\Component;

new class extends Component {
    public $target;
}; ?>

<div>
    <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="{{ $target }}">
        <span class="bi bi-trash-fill"> Delete</span>
    </button>
</div>
