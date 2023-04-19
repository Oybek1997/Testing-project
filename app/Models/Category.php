<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title'
    ];
public function catalogs()
{
return $this->belongsToMany(Catalog::class);
}

public function products()
{
return $this->hasMany(Product::class);
}
}
