<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortLink extends Component
{
    public $columnName;
    public const SORT_ICONS = [
        'desc' => 'fa-solid fa-sort-down',
        'asc' => 'fa-solid fa-sort-up',
        'both' => 'fa-solid fa-sort'
    ];
    public const SORT_TYPES = ['asc', 'desc'];
    public const SORT_DEFAULT = 'desc';

    public function __construct($columnName)
    {
        $this->columnName = $columnName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        $routeName = request()->route()->getName();
        $params = request()->all();
        $params['column_name'] = $this->columnName;
        $params['sort_type'] = static::SORT_DEFAULT;
        $sortIcon = static::SORT_ICONS['both'];

        if ($this->columnName === request()->get('column_name') && in_array(request()->get('sort_type'), static::SORT_TYPES)) {
            $params['sort_type'] = strtolower(trim(request()->get('sort_type'))) === 'desc' ? 'asc' : 'desc';
            $sortIcon = request()->get('sort_type') === static::SORT_TYPES[0] ? static::SORT_ICONS['asc'] : static::SORT_ICONS['desc'];
        }

        return view('components.sort-link', [
            'sortUrl' => route($routeName, $params),
            'sortIcon' => $sortIcon,
        ]);
    }
}
