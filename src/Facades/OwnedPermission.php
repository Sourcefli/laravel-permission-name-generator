<?php

namespace Sourcefli\PermissionName\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;


/**
 * Class OwnedPermission
 * @package Sourcefli\PermissionName\Facades
 *
 * @see \Sourcefli\PermissionName\PermissionGenerator::class
 *
 * @see \Sourcefli\PermissionName\PermissionGenerator::all()
 * @method static Collection all()
 */
class OwnedPermission extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'OwnedPermission';
    }
}
