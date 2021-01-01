<?php

namespace App\Providers;

use App\Settings\MailSettings;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $config = array(
            'driver'     => app(MailSettings::class)->mailer,
            'host'       => app(MailSettings::class)->host,
            'port'       => app(MailSettings::class)->port,
            'from'       => array('address' => app(MailSettings::class)->from_address, 'name' => app(MailSettings::class)->from_name),
            'encryption' => app(MailSettings::class)->encryption,
            'username'   => app(MailSettings::class)->username,
            'password'   => app(MailSettings::class)->password,
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
