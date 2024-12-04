<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class taches extends Model
{
    use HasFactory;
    protected $fillable = [
        'taches_name',
        'date_echeances',
        'user_action',
        'categorie_id',
        'confirmation',
        'statut',


    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function categorie():BelongsTo{
        return $this->belongsTo(categorie::class);
    }
}
