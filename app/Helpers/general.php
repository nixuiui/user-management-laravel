<?php

function hasPermissionByKey($permissions, $permissionKey) {
    $find = $permissions->first(function($value, $key) use ($permissionKey) {
        return $value->key == $permissionKey;
    });
    
    return $find != null;
}