<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $primaryKey = 'category_id';
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'category_name'
    ];
}
