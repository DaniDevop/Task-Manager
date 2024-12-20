<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class user_role extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'role_id',
        'user_id',

    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function role():BelongsTo{
        return $this->belongsTo(role::class);
    }
}
