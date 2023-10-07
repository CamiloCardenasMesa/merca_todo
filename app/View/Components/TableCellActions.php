<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableCellActions extends Component
{
    public $route;
    public $hoverBgClass;
    public $svgPath;

    public function __construct($route, $hoverBgClass, $svgPath)
    {
        $this->route = $route;
        $this->hoverBgClass = $hoverBgClass;
        $this->svgPath = $svgPath;
    }

    public function render()
    {
        return view('components.table-cell-actions');
    }
}
