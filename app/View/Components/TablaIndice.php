<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TablaIndice extends Component
{
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct($id = 'indice-tabla')
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tabla-indice');
    }
}
