<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $fillable = [
        "title",
        "body",
        "category_id"
    ];
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }

    public function getPaginateByLimit(int $limit_count = 1)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
