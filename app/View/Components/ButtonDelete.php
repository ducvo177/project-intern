<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonDelete extends Component
{
    public $route;
    public $userId;
    public $currentUserId;

    public function __construct($route, $userId, $currentUserId)
    {
        $this->route = $route;
        $this->userId = $userId;
        $this->currentUserId = $currentUserId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-delete');
    }
}
