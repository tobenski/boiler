<?php

namespace App\Providers;

use Illuminate\Mail\Mailer;
use Illuminate\Support\ServiceProvider;
use Swift_Mailer;
use Swift_SmtpTransport;
use Illuminate\Support\Arr;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('user.mailer', function ($app, $parameters) {

            $transport = new Swift_SmtpTransport($parameters['smtp_host'], $parameters['smtp_port']);
            $transport->setUsername($parameters['smtp_username']);
            $transport->setPassword($parameters['smtp_password']);
            $transport->setEncryption($parameters['smtp_encryption']);

            $swift_mailer = new Swift_Mailer($transport);

            $mailer = new Mailer('user.mailer',$app->get('view'), $swift_mailer, $app->get('events'));
            $mailer->alwaysFrom($parameters['from_email'], $parameters['from_name']);
            $mailer->alwaysReplyTo($parameters['reply_to_email'], $parameters['reply_to_name']);

            return $mailer;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
