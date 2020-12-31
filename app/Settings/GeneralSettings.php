<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $aws_access_key_id;
    public string $aws_secret_access_key;
    public string $aws_default_region;
    public string $aws_bucket;

    public static function group(): string
    {
        return 'general';
    }
}
