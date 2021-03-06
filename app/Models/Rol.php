<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    /**
     * Application Resources/Views available to the current Rol
     */
    public function access()
    {
        return $this->hasMany(Access::class);
    }

    /**
     * All users of the current Rol
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
