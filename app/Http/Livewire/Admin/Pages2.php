<?php

namespace App\Http\Livewire\Admin;

use App\Models\Page;
use App\Settings\GeneralSettings;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Pages2 extends Component
{
    use WithMedia;

    public $name;
    public $message = '';

    public $mediaComponentNames = ['albums'];
    public $albums = [];


    public $pages;

    protected $rules =  [
        'pages.*.name' => 'required|string|max:191',
        'pages.*.slug' => '',
        'pages.*.description' => 'required|string',
        'pages.*.short_description' => 'required|string|max:191',
        'pages.*.keywords' => 'required|string',
        'pages.*.header_1' => 'nullable|string|max:191',
        'pages.*.header_2' => 'nullable|string|max:191',
        'pages.*.content_1' => 'nullable|string',
        'pages.*.content_2' => 'nullable|string',
        'pages.*.content_3' => 'nullable|string',
        'pages.*.content_4' => 'nullable|string',
        'pages.*.notes' => 'nullable|string',
        'pages.*.online' => 'boolean',
        'pages.*.order' => 'required|numeric',
        'pages.*.parent_id' => 'required|numeric',
    ];

    public function mount()
    {
        $this->pages = Page::all();
        //$this->downloads = $this->pages->first()->getMedia();
    }


    public function render()
    {
        return view('livewire.admin.pages')
            ->layout('layouts.admin', [
                'title' => app(GeneralSettings::class)->site_name . ' | ' . __('Pages'),
                'header' => app(GeneralSettings::class)->site_name
            ]);
    }

    public function submitPage($id, $index)
    {

        $this->validate([
            'pages.' . $index . '.name' => 'required|string|max:191',
            'pages.' . $index . '.slug' => '',
            'pages.' . $index . '.description' => 'required|string',
            'pages.' . $index . '.short_description' => 'required|string|max:191',
            'pages.' . $index . '.keywords' => 'required|string',
            'pages.' . $index . '.header_1' => 'nullable|string|max:191',
            'pages.' . $index . '.header_2' => 'nullable|string|max:191',
            'pages.' . $index . '.content_1' => 'nullable|string',
            'pages.' . $index . '.content_2' => 'nullable|string',
            'pages.' . $index . '.content_3' => 'nullable|string',
            'pages.' . $index . '.content_4' => 'nullable|string',
            'pages.' . $index . '.notes' => 'nullable|string',
            'pages.' . $index . '.online' => 'boolean',
            'pages.' . $index . '.order' => 'required|numeric',
            'pages.' . $index . '.parent_id' => 'required|numeric',
            'albums.*.name' => '',
        ]);
        $page = $this->pages->where('id', $id)->first();


        $page->syncFromMediaLibraryRequest($this->albums)
            ->toMediaCollection('album');

            $page->save();
        $this->message = 'Your form has been submitted';
    }
}
