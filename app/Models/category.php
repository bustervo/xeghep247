<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    // 👪 Danh mục cha
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // 👶 Danh mục con
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // 📌 Optional: Scope để lấy danh mục gốc.
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }
}
