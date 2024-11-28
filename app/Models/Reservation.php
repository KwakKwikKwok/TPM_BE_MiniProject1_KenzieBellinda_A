<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['guest_id', 'reservation_time', 'seats'];
    
    public function guest()
    {
        return $this->belongsTo(Guest::class, 'guest_id', 'id');
    }
}
