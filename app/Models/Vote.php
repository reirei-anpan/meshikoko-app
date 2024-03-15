<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enquete;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'enquete_id',
        'name',
        'location',
        'reservation_time',
        'cuisine_type',
        'ambiance',
    ];

    public function enquetes()
    {
        return $this->belongsTo(Enquete::class, 'enquete_id');
    }
}
