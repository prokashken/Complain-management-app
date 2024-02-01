<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public $fillable = ['assigned_person'];

    public function forwardTickets(): HasMany
    {
        return $this->hasMany(ForwardTicket::class);
    }
}
