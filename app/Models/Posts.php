<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    
    protected $tabel = "posts"; // Nama Table
    protected $primaryKey = "id"; // primary key nya = id
    protected $keyType = 'string'; // Tipe Primary Key
    protected $fillable = ['id', 'title', 'content', 'user_id', 'category_id', 'image_url'];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relasi dengan model Category
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
