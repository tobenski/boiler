<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MailSettings extends Settings
{
    public string $mailer;
    public string $host;
    public int $port;
    public string $username;
    public string $password;
    public string $encryption;
    public string $from_address;
    public string $from_name;
    public string $reply_to_address;

    public static function group(): string
    {
        return 'mail';
    }

    public static function encrypted(): array
    {
        return [
            'password'
        ];
    }
}
