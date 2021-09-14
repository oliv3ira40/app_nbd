<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $fillable = [
        'name',
        'value',
        'purchase_date',
        'start_sales_period',
        'end_sales_period',
        'user_id',
        'entity_id',
        'specifier_id',
        'cpf_or_cnpj_client',
        'sale_code',
        'validated',
        'computed_for_reporting',
    ];
    protected $dates = ['purchase_date', 'start_sales_period', 'end_sales_period'];



    function User() {
        return $this->belongsTo('App\Models\Admin\User', 'user_id');
    }

    function Specifier() {
        return $this->belongsTo('App\Models\Entities\Entity', 'specifier_id');
    }

    function Entity() {
        return $this->belongsTo('App\Models\Entities\Entity', 'entity_id');
    }
}