<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortLink extends Component
{
    public $columnName;
    public $sortType;
    public const SORT_ICONS = ['fa-solid fa-sort-down', 'fa-solid fa-sort-up','fa-solid fa-sort'];
    public const SORT_TYPES = ['asc', 'desc'];
    public const SORT_DEFAULT = 'desc';



    public function __construct($columnName, $sortType)
    {
        $this->columnName = $columnName;
        $this->sortType = $sortType;
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

        if ($this->columnName === request()->get('column_name') && in_array(request()->get('sort_type'), static::SORT_TYPES)) {
            $params['sort_type'] = request()->get('sort_type') === 'desc' ? 'asc' : 'desc';
        }
        $sortUrl = route($routeName, $params);

        if(request()->get('sort_type') == 'desc' && request()->get('column_name') == $this->columnName){
            $sortIcon = static::SORT_ICONS[0];
        }elseif(request()->get('sort_type') == 'asc' && request()->get('column_name') == $this->columnName){
            $sortIcon = static::SORT_ICONS[1];
        }else{
            $sortIcon = static::SORT_ICONS[2];
        }

        return view('components.sort-link', [
            'sortUrl' => $sortUrl,
            'sortIcon'=>$sortIcon,
        ]);
    }
}
