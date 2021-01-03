<?php

namespace App\Http\Livewire\Admin\Page;

use App\Models\Page;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Form extends Component
{
    use WithMedia;

    public Page $page;


    // Media
    public $mediaComponentNames = ['albums', 'image'];
    public $albums = [];
    public $image; //page collection

    protected $rules = [
        'page.name' => 'required|string|max:191',
        'page.slug' => '',
        'page.description' => 'required|string',
        'page.short_description' => 'required|string|max:191',
        'page.keywords' => 'required|string',
        'page.header_1' => 'nullable|string|max:191',
        'page.header_2' => 'nullable|string|max:191',
        'page.content_1' => 'nullable|string',
        'page.content_2' => 'nullable|string',
        'page.content_3' => 'nullable|string',
        'page.content_4' => 'nullable|string',
        'page.notes' => 'nullable|string',
        'page.online' => 'boolean',
        'page.order' => 'required|numeric',
        'page.parent_id' => 'required|numeric',
        'albums' => 'max:5',
        'image' => 'max:1',
    ];

    public function mount(Page $page)
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.admin.page.form');
    }

    public function submit()
    {
        $this->validate([
            'page.name' => 'required|string|max:191',
            'page.slug' => '',
            'page.description' => 'required|string',
            'page.short_description' => 'required|string|max:191',
            'page.keywords' => 'required|string',
            'page.header_1' => 'nullable|string|max:191',
            'page.header_2' => 'nullable|string|max:191',
            'page.content_1' => 'nullable|string',
            'page.content_2' => 'nullable|string',
            'page.content_3' => 'nullable|string',
            'page.content_4' => 'nullable|string',
            'page.notes' => 'nullable|string',
            'page.online' => 'boolean',
            'page.order' => 'required|numeric',
            'page.parent_id' => 'required|numeric',
            'albums' => 'max:5',
            'image' => 'max:1',
        ]);

        $this->page->save();
/*
        $this->page->syncFromMediaLibraryRequest($this->albums)
            ->toMediaCollection('album');

        $this->page->syncFromMediaLibraryRequest($this->image)
            ->toMediaCollection('page');*/
    }
}
