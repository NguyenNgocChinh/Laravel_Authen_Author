<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permission(){
        return $this->belongsToMany(Permission::class,'user-permission','userId','permissionId');
    }

    public function group(){
        return $this->belongsToMany(Group::class, 'user-group','userId','groupId');
    }

    public function hasAccess($permission_name) : bool
    {
        foreach ($this->permission()->get() as $permission)
        {
            if ($permission->name == $permission_name)
                return true;
        }
        foreach ($this->group()->get() as $group)
        {
            foreach ($group->permission()->get() as $permission) {
                if ($permission->name == $permission_name)
                    return true;
            }
        }

        return false;
    }

    public function hasAccessAdmin() : bool
    {
        foreach ($this->group()->get() as $group)
        {
            if ($group->name == 'admin')
                return true;
        }
        return false;
    }
}
