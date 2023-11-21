<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'id',
        'content'
    ];
}
