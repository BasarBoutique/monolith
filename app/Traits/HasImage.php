<?php

namespace App\Traits;

use App\Services\Image\ImageService;

trait HasImage
{
    public function getImageUrl($imageName) : ?string
    {
        return ImageService::getUrlPath($imageName);
    }
}
