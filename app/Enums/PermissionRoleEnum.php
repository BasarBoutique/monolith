<?php

namespace App\Enums;

enum PermissionRoleEnum:int {
    case CLIENT = 1;
    case EMPLOYEE = 2;
    case AUTHOR = 3;
    case ADMIN = 4;
}
