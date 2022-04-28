<?php

namespace App\Traits;

use App\Services\Image\ImageService;
use Exception;
use Illuminate\Support\Facades\Log;
trait HasImage
{
    public function getImageUrl($imageName) : ?string
    {
        try {
            return ImageService::getUrlPath($imageName);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Traits',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }
}
