<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class ForwardTicket extends Model
{
    use HasFactory;

    public static function forwardableList(){

        return User::where('is_admin',1)->where('id','!=',Auth::user()->id)->get();
        // return User::where('is_admin',1)->where('id','!=',Auth::user()->id)->where('role',Auth::user()->role)->get();
    }

      public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
