<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Det Gamle Posthus');
        $this->migrator->add('general.aws_access_key_name', '');
        $this->migrator->add('general.aws_secret_access_key','');
        $this->migrator->add('general.aws_default_region', '');
        $this->migrator->add('general.aws_bucket','');
    }
}
