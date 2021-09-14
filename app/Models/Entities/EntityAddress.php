<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class EntityAddress extends Model
{
    protected $table = 'entities_addresses';
    protected $fillable = [
        'zip_code',
        'street',
        'neighborhood',
        'city',
        'state',
        'ibge',
        'entity_id',
    ];
}
