<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    use HasFactory;

    protected $table = 'group-permission';
    protected $primaryKey = 'id';
    public $timestamps = false;


}
