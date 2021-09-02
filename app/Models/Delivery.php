<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date']; 
    
    /**
     * Set the date
     *
     * @param  string  $value
     * @return void
     */
    public function setDateAttribute($value)
    {
        $this->attributes['date'] =Carbon::parse($value);
    }

    /**
     * 
     * 
     * The delivery that belong to the route.
     */
    public function route()
    {
        return $this->belongsToMany(Route::class, 'deliveries_routes')->withPivot('position')->orderBy('pivot_position', 'asc');
    }

}
