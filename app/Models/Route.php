<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $table = 'routes';

    protected $fillable = ['id']; 

     /**
     * The routes that belong to the delivery.
     */
    public function delivery()
    {
        return $this->belongsToMany(Delivery::class, 'deliveries_routes')->withPivot('position')->orderBy('pivot_position', 'asc');
    }
}
