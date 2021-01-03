<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use App\Settings\GeneralSettings;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class PagesMedia extends Component
{
    use WithMedia;

    public Page $page;
    public $page_id;
    protected $queryString = ['page_id'];

    public $mediaComponentNames = ['myUpload', 'albums'];

    public $myUpload;

    public $albums = [];

    protected $rules = [
        'albums' => '',
    ];

    public function mount()
    {
        $this->page = Page::where('id', $this->page_id)->first();
    }

    public function render()
    {
        return view('livewire.admin.pages-media')
            ->layout('layouts.admin', [
                'title' => app(GeneralSettings::class)->site_name . ' | ' . __('Pages - Media'),
                'header' => app(GeneralSettings::class)->site_name
            ]);
    }

    public function submit()
    {
        $this->validate([
            'albums' => 'max:5',
        ]);
        //$this->page->addFromMediaLibraryRequest($this->myUpload)
          //          ->toMediaCollection('page');

        $this->page->syncFromMediaLibraryRequest($this->albums)
            ->toMediaCollection('album');

        //$this->clearMedia('myUpload');
    }
}
