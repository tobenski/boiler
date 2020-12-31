<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateMailSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mail.mailer', 'smtp');
        $this->migrator->add('mail.host', '');
        $this->migrator->add('mail.port', '587');
        $this->migrator->add('mail.username', 'test');
        $this->migrator->addEncrypted('mail.password', 'password');
        $this->migrator->add('mail.encryption', 'tls');
        $this->migrator->add('mail.from_address', 'test@test.com');
        $this->migrator->add('mail.from_name', 'Test Application');
        $this->migrator->add('mail.reply_to_address', 'test@test.com');

    }
}
