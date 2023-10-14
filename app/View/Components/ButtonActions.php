<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonActions extends Component
{
    public $route;
    public $hoverBgClass;
    public $svgPath;
    public $text;

    public function __construct($route, $hoverBgClass, $svgPath, $text)
    {
        $this->route = $route;
        $this->hoverBgClass = $hoverBgClass;
        $this->svgPath = $svgPath;
        $this->text = $text;
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
