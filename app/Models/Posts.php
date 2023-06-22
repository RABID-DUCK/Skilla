<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = false;

    public function categories(){
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}