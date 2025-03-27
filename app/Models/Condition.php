<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $fillable = [
        'name',
        'methode_name',
        'description',
    ];


    public function badges()
    {
        return $this->belongsToMany(Badge::class)
            ->withPivot('required_value');
    }
}
