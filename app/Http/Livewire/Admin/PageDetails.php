<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use App\Settings\GeneralSettings;
use Livewire\Component;

class PageDetails extends Component
{
    public $pages;
    public $page;

    public function mount()
    {
        $this->pages = Page::all();
        $this->page = $this->pages->first();
    }

    public function render()
    {
        return view('livewire.admin.page-details')
            ->layout('layouts.admin', [
                'title' => app(GeneralSettings::class)->site_name . ' | ' . __('Pages'),
                'header' => app(GeneralSettings::class)->site_name
        ]);
    }
}
