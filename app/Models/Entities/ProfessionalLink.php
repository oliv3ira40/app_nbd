<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class ProfessionalLink extends Model
{
    protected $table = 'professional_link';
    protected $fillable = [
        'invitation',
        'invitation_accepted',
        'user_id',
        'entity_id',
    ];
    protected $dates = ['invitation_accepted'];



    function User() {
        return $this->belongsTo('App\Models\Admin\User', 'user_id');
    }
    function Entity() {
        return $this->belongsTo('App\Models\Entities\Entity', 'entity_id');
    }
}