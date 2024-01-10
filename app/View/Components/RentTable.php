<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RentTable extends Component
{ 
    public $rent;

    /**
     * Create a new component instance.
     */
    public function __construct($rent)
    {
        $this->rent = $rent;
    }

    /**
     * Get the view / contents that represent the component.
     */
     public function render(): View|Closure|string
    {
        return view('components.rent-table');
    }
}
