<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = [
        'name',
        'data_path',
        'user_id',
        'entity_id',
    ];



    function User()
    {
        return $this->belongsTo('App\Models\Admin\User', 'user_id');
    }
}