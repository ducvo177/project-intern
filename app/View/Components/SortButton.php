<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortButton extends Component
{
    public $sortBy;
    public $colName;
    public $sortType;
    /**
     * Create a new component instance.
     *
     * @param  string  $sortBy
     *
     * @return void
     */

    public function __construct($sortBy, $colName, $sortType)
    {
        $this->sortBy = $sortBy;
        $this->colName = $colName;
        $this->sortType= $sortType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.sort-button');
    }
}
