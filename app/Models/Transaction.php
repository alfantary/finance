<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'category_id',
        'tanggal',
        'jumlah',
        'uraian',
        'image'
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function scopeExpanses($query){
        return $query->whereHas('category', function($query){
            $query->where('is_expanse', true);
        });
    }

    public function scopeIncomes($query){
        return $query->whereHas('category', function($query){
            $query->where('is_expanse', false);
        });
    }
}
