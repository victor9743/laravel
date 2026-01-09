<?php

namespace App\Livewire;

use Livewire\Component;

class InlineComponent extends Component
{
    public string $value, $php_value;

    public function mount($value, $php_value)
    {
        $this->value = $value;
        $this->php_value = $php_value;
    }

    public function render()
    {
        return <<<'HTML'
        <div>
            <p class="display-6 text-center text-info">Hello word</p>
            <div>
                {{ $value }}
            </div>
            <div>
                {{ $php_value }}
            </div>
        </div>
        HTML;
    }
}
