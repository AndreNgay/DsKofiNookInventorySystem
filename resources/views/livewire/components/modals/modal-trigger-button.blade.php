<?php

use Livewire\Volt\Component;

new class extends Component {
    public $title = "";
    public $target = "";

}; ?>
<div>
    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
            data-bs-target="{{ $target }}">
            {{ $title }}
    </button>
</div>

