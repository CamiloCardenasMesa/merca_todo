<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonActions extends Component
{
    public $route;
    public $svgPath;

    public function __construct($route, $svgPath)
    {
        $this->route = $route;
        $this->svgPath = $svgPath;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-actions');
    }
}
