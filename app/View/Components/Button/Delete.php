<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Delete extends Component
{
    
    public function __construct(public $id = null, public $path = null, public $url = null)
    {
         $this->url = $url;
         $this->id = $id;
    }

  
    public function render(): View|Closure|string
    {
        return view('components.button.delete');
    }
}
