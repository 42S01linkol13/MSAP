<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use phpseclib3\Net\SFTP;

class FtpServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('ftp', function ($app) {
            return new SFTP('','','');
        });
    }
}
