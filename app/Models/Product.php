<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;




    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->closing_time = now()->addMinutes(5);
        });

    }
}
