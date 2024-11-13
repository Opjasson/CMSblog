<?php

namespace App\View\Components\Icon;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BsIcon extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name
    )
    {
        //

    }

    public function shouldRender(): bool
    {
        // Jika name ada valuenya maka component akan dirender
        return isset($this->name);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icon.bs-icon');
    }
}
