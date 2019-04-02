<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name", "price", "category_id", "description", "status", "images"];

    public function category() {
        return $this->hasOne("App\Category");
    }
}
