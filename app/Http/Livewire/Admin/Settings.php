<?php

namespace App\Http\Livewire\Admin;

use App\Settings\GeneralSettings;
use App\Settings\MailSettings;
use Livewire\Component;


class Settings extends Component
{
    public $activeSetting = 'general';
    public array $general = [];
    public array $mail = [];

    public function mount()
    {
        $this->general = $this->addSettingsToArray(GeneralSettings::class);
        $this->mail = $this->addSettingsToArray(MailSettings::class);
    }


    public function render()
    {
        return view('livewire.admin.settings')
            ->layout('layouts.admin', [
                'title' => app(GeneralSettings::class)->site_name . ' | ' . __('Settings'),
                'header' => app(GeneralSettings::class)->site_name
            ]);
    }

    public function submitGeneral(GeneralSettings $settings)
    {
        $this->validate([
            'general.site_name' => 'nullable|string|max:191',
            'general.aws_access_key_id' => 'nullable|string|max:191',
            'general.aws_secret_access_key' => 'nullable|string|max:191',
            'general.aws_default_region' => 'nullable|string|max:191',
            'general.aws_bucket' => 'nullable|string|max:191',
        ]);

        foreach ($this->general as $key => $value) {
            $settings->$key = $value;
        }
        $settings->save();
        session()->flash('success', 'General Settings Updated!!');
    }

    public function submitMail(MailSettings $settings)
    {
        $this->validate([
            'mail.mailer' => 'nullable|string|max:191',
            'mail.host' => 'nullable|string|max:191',
            'mail.port' => 'nullable|numeric',
            'mail.username' => 'nullable|string|max:191',
            'mail.password' => 'nullable|string|max:191',
            'mail.encryption' => 'nullable|string|191',
            'mail.from_address' => 'nullable|string|email',
            'mail.from_name' => 'nullable|string|max:191',
            'mail.reply_to_address' => 'nullable|string|email',
        ]);

        foreach ($this->mail as $key => $value) {
            $settings->$key = $value;
        }
        session()->flash('success', 'Mail Settings Updated!!');
    }

    // Private Helpers
    private function addSettingsToArray($setting)
    {
        $arr = [];
        foreach (app($setting) as $key => $value) {
            $arr[$key] = $value;
        }
        return $arr;
    }

}
