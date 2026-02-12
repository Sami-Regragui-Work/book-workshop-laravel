<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'image_url', 'isbn', 'author_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}
