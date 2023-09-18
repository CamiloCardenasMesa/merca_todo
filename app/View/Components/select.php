<?php

namespace App\View\Components;

use Illuminate\View\Component;

class select extends Component
{
    public $name;
    public $options;

    public function __construct($name, $options)
    {
        $this->name = $name;
        $this->options = $options;
    }

    public function render()
    {
        return view('components.select');
    }
}
