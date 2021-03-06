<?php

namespace App\Models;

use App\Observers\ToolObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tool extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table = 'tools';
    protected $fillable = [
        'id_product',
        'name_product',
        'quantity',
    ];

    protected $dispatchesEvents = [
      'created' => ToolObserver::class,
    ];
}
