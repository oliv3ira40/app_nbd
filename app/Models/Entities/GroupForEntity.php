<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class GroupForEntity extends Model
{
    protected $table = 'groups_for_entities';
    protected $fillable = [
        'name',
        'tag',
        'tag_color',
    ];
}
