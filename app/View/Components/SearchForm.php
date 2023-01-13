<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

class SearchForm extends Component
{
    public function render()
    {
        return view('components.search-form');
    }
}
