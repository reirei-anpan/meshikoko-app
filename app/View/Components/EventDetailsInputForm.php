<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventDetailsInputForm extends Component
{
    public $formData;

    /**
     * Create a new component instance.
     */
    public function __construct($formData = null)
    {
        $this->formData = $formData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-details-input-form');
    }
}
