<?php

namespace App\View\Components;

use App\Models\Link;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinkCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Link $link
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.link-card');
    }
}
