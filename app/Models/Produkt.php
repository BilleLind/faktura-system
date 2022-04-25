<?php

namespace App\Models;

use App\Models\ordre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produkt extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'produkter';


    protected $fillable = [
        'titel',
        'description',
        'pris',

    ];

    public function ordrer()
    {
        return $this->belongsToMany(ordre::class);
    }
}
