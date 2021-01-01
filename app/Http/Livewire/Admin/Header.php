<?php

namespace App\Http\Livewire\Admin;

use App\Settings\GeneralSettings;
use Livewire\Component;

class Header extends Component
{
    public $siteName;
    public $title;

    public function mount($siteName = null, $title = null)
    {
        $this->siteName = $siteName ? $siteName : app(GeneralSettings::class)->site_name;
        $this->title = $title ? $title : app(GeneralSettings::class)->site_name;
    }
    public function render()
    {
        return view('livewire.admin.header');
    }
}
