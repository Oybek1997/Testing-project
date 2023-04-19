<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title'
    ];

public function category()
{
return $this->belongsTo(Category::class);
}

public function catalog()
{
    return $this->belongsTo(Catalog::class);
}
}
