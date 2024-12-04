<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_action',
        

    ];
    public function taches():HasMany{
        return $this->hasMany(taches::class);
    }
}
