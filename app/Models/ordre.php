<?php

namespace App\Models;

use App\Models\User;
use App\Models\Faktura;
use App\Models\Produkt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ordre extends Model
{
    use HasFactory;

    protected $table = 'ordrer';


    protected $fillable = [
        'status',
        'total_pris',
        'moms',
        'fragt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function faktura()
    {
        return $this->hasOne(Faktura::class);
    }

    public function produkter()
    {
        return $this->belongsToMany(Produkt::class)->withPivot('kvantitet');
    }
}
