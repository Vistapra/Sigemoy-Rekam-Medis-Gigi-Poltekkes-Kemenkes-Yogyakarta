<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageServiceProvider as BaseImageServiceProvider;

class ImageServiceProvider extends BaseImageServiceProvider
{
    public function register()
    {
        parent::register();
    }
}