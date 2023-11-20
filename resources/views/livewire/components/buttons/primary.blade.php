<?php

use Livewire\Volt\Component;

new class extends Component {
    public $title;
    public $class;
    public $type;
}; ?>

<div>
    <button class="btn btn-primary {{ $class }}" type="{{ $type }}">{{ $title }}</button>
</div>
