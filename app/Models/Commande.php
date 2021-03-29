<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'uuid',
    //     'id_produit'
    // ];
    public function produit()
        {
            return $this->belongsTo(Produit::class);
        }
}
