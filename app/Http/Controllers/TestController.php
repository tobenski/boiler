<?php

namespace App\Http\Controllers;

use App\Jobs\UserMailerJob;
use App\Mail\TestMail;
use App\Settings\GeneralSettings;
use App\Settings\MailSettings;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return app(GeneralSettings::class)->site_name;
    }

    public function sendMail()
    {
        $configuration = [
            'smtp_host'    => app(MailSettings::class)->host,
            'smtp_port'    => app(MailSettings::class)->port,
            'smtp_username'  => app(MailSettings::class)->username,
            'smtp_password'  => app(MailSettings::class)->password,
            'smtp_encryption'  => app(MailSettings::class)->encryption,

            'from_email'    => app(MailSettings::class)->from_address,
            'from_name'    => app(MailSettings::class)->from_name,

            'reply_to_email' => app(MailSettings::class)->reply_to_address,
            'reply_to_name' => app(MailSettings::class)->from_name,
           ];

           UserMailerJob::dispatch($configuration, 'tirdyr@tobenski.dk', new TestMail);

           return redirect()->to(route('home'));
    }
}
