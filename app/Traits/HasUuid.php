<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Log;

trait HasUuid
{
    /**
     * Override the boot function from Laravel so that
     * we give the model a new UUID when we create it.
     */
    protected static function boot()
    {
        parent::boot();

        $creationCallback = function ($model) {
            if (empty($model->{$model->getKeyName()}))
            {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        };

        static::creating($creationCallback);
    }


    /**
     * Override the getIncrementing() function to return false to tell
     * Laravel that the identifier does not auto increment (it's a string).
     *
     * @return bool
     */
    public function getIncrementing() : bool
    {
        try {
            return false;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Traits',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }


    /**
     * Tell laravel that the key type is a string, not an integer.
     *
     * @return string
     */
    public function getKeyType() : string
    {
        try {
            return 'string';
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Traits',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }
}
