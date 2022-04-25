<?php

namespace App\Models;

use App\Models\ordre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faktura extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'skabt',
        'total_pris',
        'til_firma',
        'til_addresse',
        'til_cvr'
    ];

    public function ordre()
    {
        return $this->belongsTo(ordre::class);
    }
}
