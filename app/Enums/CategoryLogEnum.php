<?php

namespace App\Enums;

enum CategoryLogEnum : string {
    const CATEGORY_CREATED = 'CATEGORY_CREATED';
    const CATEGORY_UPDATED = 'CATEGORY_UPDATED';
    const CATEGORY_REMOVED = 'CATEGORY_REMOVED';
    const CATEGORY_ENABLED = 'CATEGORY_ENABLED';
}
