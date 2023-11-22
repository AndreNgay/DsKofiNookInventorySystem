<?php

use Livewire\Volt\Component;

new class extends Component {
    public $title;
}; ?>

<div>
    <button class="btn btn-primary w-100" type="button"><span class="bi bi-plus-lg"> {{ $title }}</span></button>
</div>
