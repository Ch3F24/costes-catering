<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $transparent,
        public bool $slider
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        /** @var Navigation[] $links */
        $links = \App\Models\Navigation::published()->get()->toTree();
        return view('components.navigation', ['links' => $links]);
    }
}
