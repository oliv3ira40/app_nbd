<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class MonthlySaleResult extends Model
{
    protected $table = 'monthly_sales_results';
    protected $fillable = [
        'month',
        'year',
        'number_of_sales',
        'number_of_unique_sales',
        'accumulated_points',
        'specifier_id',
        'entity_id',
    ];
}
