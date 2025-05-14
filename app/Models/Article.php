<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        "description",
        "details",
        "color",
        "image",
        "shop_id",
        "price"
     ];

    public function categories(){
        return $this->belongsToMany(Article::class);
    }
}
