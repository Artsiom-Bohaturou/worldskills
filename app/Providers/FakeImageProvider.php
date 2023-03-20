<?php

namespace App\Providers;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FakeImageProvider extends Base
{
    public function loremflickr(string $dir = '', int $width = 640, int $height = 480, string $type = null): string
    {
        $name = $dir . DIRECTORY_SEPARATOR . Str::random(10) . '.jpg';

        Storage::put('public' . DIRECTORY_SEPARATOR . $name, file_get_contents("https://loremflickr.com/$width/$height/$type"));

        return DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $name;
    }
}
