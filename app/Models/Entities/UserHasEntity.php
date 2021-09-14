<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class UserHasEntity extends Model
{
    protected $table = 'users_has_entities';
    protected $fillable = [
        'user_id',
        'entity_id',
    ];

    
    
    function Entity() {
        return $this->belongsTo('App\Models\Entities\Entity', 'entity_id');
    }
    
    function User() {
        return $this->belongsTo('App\Models\Admin\User', 'user_id');
    }
}
