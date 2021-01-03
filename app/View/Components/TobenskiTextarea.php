<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TobenskiTextarea extends Component
{
    public $model;
    public $title;
    public $attr;
    /**
     * Create a new component instance.
     * @var EleoqentModel $model
     * @var String $attr
     * @var String $title
     *
     * @return void
     */
    public function __construct($model, $attr, $title)
    {
        $this->model = $model;
        $this->title = $title;
        $this->attr = $attr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.tobenski-textarea');
    }
}
