<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;

    /**
     * routes json column follows this format ( route : uri ), example:
     * [ { "route" : "/route"  }, { "route" : "/route2" } ]
     */
    protected $fillable = [
        'routes',
        'location_id',
        'rol_id',
        'occupation_id'
    ];


    /**
     * This way json_decode() wont be necessary $access->routes
     */
    protected $casts = [
        'routes' => 'array'
    ];

    /** 
     * Resources/views available to the location
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /** 
     * Resources/views available to the occupation
     */
    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    /** 
     * Resources/views available to the user rol
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }
}
