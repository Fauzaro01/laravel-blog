<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $primaryKey = "d";
    protected $keyType = "string";
    protected $fillable = [
        'id',
        'content',
        'user_id',
        'post_id'
    ];

    public function posts() {
        return $this->belongsTo(Posts::class);
    }

    public function user()
    {
    return $this->belongsTo(Users::class);
    }
}
