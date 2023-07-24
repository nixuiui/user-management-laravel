<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model {

    use SoftDeletes;
    protected $table = 'user_roles';

    // this is a recommended way to declare event handlers
    protected static function booted () {
        static::deleting(function($data) {
             $data->rolePermssions()->delete();
        });
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

    public function rolePermssions() {
        return $this->hasMany(RolePermission::class, 'role_id');
    }
}
