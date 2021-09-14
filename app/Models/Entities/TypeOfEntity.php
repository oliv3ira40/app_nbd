<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class TypeOfEntity extends Model
{
    protected $table = 'types_of_entities';
    protected $fillable = [
        'name',
        'tag',
        'tag_color',
    ];
}
