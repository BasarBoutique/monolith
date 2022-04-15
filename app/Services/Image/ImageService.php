<?php

namespace App\Services\Image;

use App\DTO\ImageDTO;
use App\DTO\Interfaces\DTOInterface;
use DateTime;
use Exception;
use Google\Cloud\Storage\StorageObject;
use Kreait\Firebase\Contract\Storage;
use Illuminate\Database\Eloquent\Model;

class ImageService
{
    private Storage $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    public static function getUrlPath($imageName) : ?string
    {
        if(empty($imageName) && !$imageName) {
            return '';
        }

        $object = app('firebase.storage')->getBucket()->object($imageName);

        return $object->signedUrl(new DateTime('2022-09-09T15:03:01.012345Z'));
    }

    public function uploadImage(DTOInterface $dto, array $attributes)
    {
        try {
            $imageDTO = $dto::make($attributes);

            $firebase_base_path = $imageDTO['folder'];
            $local_folder = public_path('firebase-temp-uploads') . '/';

            $extension = $imageDTO['file']->getClientOriginalExtension();
            $file = $imageDTO['id'] . "." . $extension;

            if($imageDTO['file']->move($local_folder, $file)) {

                $upload_file = fopen($local_folder . $file, 'r');

                $promise = $this->storage->getBucket()->uploadAsync($upload_file,
                [
                    'name' => $firebase_base_path . $file
                ]);

                $object = $promise->wait();

                unlink($local_folder . $file);

                return $object->info();
            }

            return null;

        } catch (Exception $e) {

            throw $e;
        }
    }
}
