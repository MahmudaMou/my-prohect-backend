<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table ='items';
    protected $guarded = ['id'];
    
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset($value);
        }
    }
}

