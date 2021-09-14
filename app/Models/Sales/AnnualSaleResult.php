<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class AnnualSaleResult extends Model
{
    protected $table = 'annual_sales_results';
    protected $fillable = [
        'year',
        'number_of_sales',
        'number_of_unique_sales',
        'accumulated_points',
        'specifier_id',
        'entity_id',
    ];
}
