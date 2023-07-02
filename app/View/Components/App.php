<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    /**
     * Create a new component instance.
     */

    public $menu;
    public $alert;
    public $title;
    public $edit;
    public function __construct($menu = null, $title = null, $alert = null, $edit = null)
    {
        $this->menu = $menu;
        $this->alert = $alert;
        $this->title = $title;
        $this->edit = $edit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app');
    }
}
