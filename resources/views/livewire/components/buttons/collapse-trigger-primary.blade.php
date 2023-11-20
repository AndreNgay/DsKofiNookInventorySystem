<?php
// <livewire:components.buttons.collapse-trigger target="collapseAddInventoryItem"/>
use Livewire\Volt\Component;

new class extends Component {
    public $target = "";
    public $title = "";
    public $class = "";
    public $type = "";
}; ?>

<div>
    <button class="btn btn-primary {{ $class }}" type="{{ $type }}" data-bs-toggle="collapse" data-bs-target="#{{ $target }}"
        aria-expanded="false" aria-controls="{{ $target }}">
        {{ $title }}
    </button>
</div>


