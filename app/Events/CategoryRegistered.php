<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CategoryRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $category;

    public function __construct($category)
    {
        $this->category = $category;
    }
}
