<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'completed_at'
    ];
    protected $dates = [
        'completed_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
