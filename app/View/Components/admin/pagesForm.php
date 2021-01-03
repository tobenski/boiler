<?php

namespace App\View\Components\admin;

use App\Models\Page;
use Illuminate\View\Component;

class pagesForm extends Component
{
    public Page $page;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admin.pages-form');
    }
}
