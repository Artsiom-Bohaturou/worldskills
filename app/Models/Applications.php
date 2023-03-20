<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_name',
        'photo_url',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
