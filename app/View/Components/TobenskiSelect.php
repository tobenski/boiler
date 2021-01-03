<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TobenskiSelect extends Component
{
    public $collection;
    public $model;
    public $title;
    public $attr;
    /**
     * Create a new component instance.
     * @var EleoqentModel $model
     * @var Collection $collection
     * @var String $attr
     * @var String $title
     *
     * @return void
     */
    public function __construct($model, $attr, $title, $collection)
    {
        $this->model = $model;
        $this->title = $title;
        $this->attr = $attr;
        $this->collection = $collection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.tobenski-select');
    }
}
