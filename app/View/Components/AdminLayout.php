<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    // Make a public property for the title
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct($title = null)
    {
        // Assign the value passed in from the Blade tag
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-layout');
    }
}
