<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonDelete extends Component
{
    public $route;
    public $deleteId;
    public $isUser;

    public function __construct($route, $deleteId, $isUser)
    {
        $this->route = $route;
        $this->deleteId = $deleteId;
        $this->isUser = $isUser;
    }

    public function render()
    {
        return view('components.button-delete');
    }
}
