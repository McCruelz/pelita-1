<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author_id', 'slug', 'body', 'image'];

    protected $with = ['author'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'author_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
