<?php

use Livewire\Volt\Component;

new class extends Component {
    public $content;
}; ?>

<div>
    <form>
        {{ $content }}
    </form>
</div>
