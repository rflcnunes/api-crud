<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historic extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sku',
        'name_product',
        'quantity',
        'deleted_at'
    ];
}
